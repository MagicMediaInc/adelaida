<?php

class ProjectController extends \BaseController {

	protected $sections = array(
		'index' => 'Todos',
		'create' => 'Nuevo',
		'edit' => 'Editar',
		'delete' => 'Eliminar'
		);

	public function __construct(){

		$this->beforeFilter('auth');

		$this->beforeFilter('projects');

		$this->module = array(
			'route' => '/projects',
			'name' => 'projects',
			'title' => 'Proyectos',
			'description' => 'Gestión de Proyectos del Sistema',
			'breadcrumbs' => $this->getBreadcumbs(),
			'sections' => $this->sections,
			'msg_danger' => Session::get('msg_danger'),
			'msg_warning' => Session::get('msg_warning'),
			'msg_success' => Session::get('msg_success'),
			'msg_active' => Session::get('msg_active'),
			);

	}

	/**
	 * Display a listing of the resource.
	 * GET /projects
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$args = array(
			'projects' => Projects::all(),
			'module' => $this->module,
			);
		Audits::add(Auth::user(), array(
			'name' => 'project_get_index',
			'title' => 'Proyectos',
			'description' => 'Vizualización de Proyectos'
			), 'READ');
		return View::make('projects.index')->with($args);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /projects/create
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$args = array(
			'module' => $this->module,
			'clients' => Clients::all(),
			'sellers' => Users::getSellers(),
			'invoice_accounts' => InvoiceAccounts::getActive(),
			'payment_methods' => PaymentMethods::getActive(),
			);
		Audits::add(Auth::user(), array(
			'name' => 'project_get_create',
			'title' => 'Añadir proyecto',
			'description' => 'Adición de proyectos'
			), 'READ');
		return View::make('projects.create')->with($args);
	}

	/**
	 * Show the form for creating a new resource.
	 * POST /projects/create
	 *
	 * @return Response
	 */
	public function postCreate()
	{

		if($project = SaleOrders::existsCorrelative(Input::get('correlative'))):

			$args = array(
				'msg_danger' => array(
					'name' => 'project_correlative_err',
					'title' => 'Error al agregar el proyecto',
					'description' => 'El Correlativo de Orden de Compra ' . Input::get('correlative') . ' ya existe.'
					)
				);
			
			Audits::add(Auth::user(), $args['msg_danger'], 'CREATE');

			return Redirect::to( $this->module['route'].'/create' )->with( $args );

		elseif($project = Projects::existsCode(Input::get('code'))):

			$args = array(
				'msg_danger' => array(
					'name' => 'project_code_err',
					'title' => 'Error al agregar el proyecto',
					'description' => 'El Código del Proyecto ' . Input::get('code') . ' ya existe.'
					)
				);
			
			Audits::add(Auth::user(), $args['msg_danger'], 'CREATE');

			return Redirect::to( $this->module['route'].'/create' )->with( $args );

   		elseif(Input::get('budget') < Input::get('advancement')):

			$args = array(
				'msg_danger' => array(
					'name' => 'project_advancement_err',
					'title' => 'Error al agregar el proyecto',
					'description' => 'El Adelanto con valor '.Input::get('advancement').' no debe ser mayor que el presupuesto con valor ' . Input::get('budget')
					)
				);
			
			Audits::add(Auth::user(), $args['msg_danger'], 'CREATE');

			return Redirect::to( $this->module['route'].'/create' )->with( $args );

   		else:

			$project = new Projects();
			$project->name = Input::get('name');
			$project->code = Input::get('code');
			$project->description = Input::get('description');
			$project->status = 'active';
			
			if( $project->save() ):

	   			$sale_order = new SaleOrders();
	   			$sale_order->correlative = Input::get('correlative');
	   			$sale_order->budget = Input::get('budget');
	   			$sale_order->id_client = Input::get('id_client');
	   			$sale_order->id_seller = Input::get('id_seller');
	   			$sale_order->id_project = $project->id;
	   			$sale_order->date = date('Y-m-d', strtotime(Input::get('date')));
	   			$sale_order->period_days = Input::get('period_days');
	   			$sale_order->status = 'active';

	   			if($sale_order->save()):

	   				if(Input::get('advancement') > 0):

	   					$receipt = new Receipts();
	   					$receipt->name = 'Adelanto de Proyecto';
	   					$receipt->description = 'Adelanto para Proyecto: '.$project->name;
	   					$receipt->id_payment_method = Input::get('id_payment_method');
	   					/*$receipt->id_invoice_account = Input::get('id_invoice_account');*/
	   					$receipt->id_sale_order = $sale_order->id;
	   					$receipt->amount = Input::get('advancement');
	   					$receipt->type = 'advancement';
	   					$receipt->status = 'active';

	   					if($receipt->save()):

							$args = array(
								'msg_success' => array(
									'name' => 'project_create',
									'title' => 'Proyecto Agregado',
									'description' => 'El proyetco ' . $project->first_name . ' ' . $project->last_name . ' fue agregado exitosamente, Orden de Compra '.$sale_order->correlative.' generada, Recibo de avance por '.$receipt->amount.' Bsf. generado.'
									)
								);

							Audits::add(Auth::user(), $args['msg_success'], 'CREATE');

							return Redirect::to( $this->module['route'] )->with( $args );

	   					else:

	   						$sale_order->delete();
	   						$project->delete();

							$args = array(
								'msg_danger' => array(
									'name' => 'project_create_err',
									'title' => 'Error al agregar el proyecto',
									'description' => 'Hubo un error al agregar el proyecto ' . $project->name . ' al momento de generar el recibo de adelanto'
									)
								);

							Audits::add(Auth::user(), $args['msg_danger'], 'CREATE');

							return Redirect::to( $this->module['route'].'/create' )->with( $args );

	   					endif;

	   				else:

						$args = array(
							'msg_success' => array(
								'name' => 'project_create',
								'title' => 'Proyecto Agregado',
								'description' => 'El proyetco ' . $project->first_name . ' ' . $project->last_name . ' fue agregado exitosamente'
								)
							);					

						Audits::add(Auth::user(), $args['msg_success'], 'CREATE');

						return Redirect::to( $this->module['route'] )->with( $args );

	   				endif;

	   			else:

	   				$project->delete();

					$args = array(
						'msg_danger' => array(
							'name' => 'project_create_err',
							'title' => 'Error al agregar el proyecto',
							'description' => 'Hubo un error al agregar el proyecto ' . $project->name . ' al momento de generar la orden de compra'
							)
						);

					Audits::add(Auth::user(), $args['msg_danger'], 'CREATE');

					return Redirect::to( $this->module['route'].'/create' )->with( $args );

	   			endif;

			else:

				$args = array(
					'msg_danger' => array(
						'name' => 'project_create_err',
						'title' => 'Error al agregar el proyecto',
						'description' => 'Hubo un error al agregar el proyecto ' . $project->name
						)
					);

				Audits::add(Auth::user(), $args['msg_danger'], 'CREATE');

				return Redirect::to( $this->module['route'].'/create' )->with( $args );

			endif;

	   	endif;

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /projects/edit/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		$args = array(
			'project' => Projects::find( Crypt::decrypt($id) ),
			'module' => $this->module,
			'clients' => Clients::all(),
			'sellers' => Users::getSellers(),
			'invoice_accounts' => InvoiceAccounts::getActive(),
			'payment_methods' => PaymentMethods::getActive(),
			);

		Audits::add(Auth::user(), array(
			'name' => 'project_get_edit',
			'title' => 'Editar proyectos',
			'description' => 'Edición de proyectos'
			), 'READ');

		return View::make('projects.edit')->with($args);

	}

	/**
	 * Show the form for editing the specified resource.
	 * POST /projects/edit/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit($id)
	{

		$project = Projects::find( Crypt::decrypt($id) );

		if(SaleOrders::existsCorrelative(Input::get('correlative'), $project->sale_order->id )):

			$args = array(
				'msg_danger' => array(
					'name' => 'project_correlative_err',
					'title' => 'Error al editar el proyecto',
					'description' => 'El Correlativo de Orden de Compra ' . Input::get('correlative') . ' ya existe.'
					)
				);

			Audits::add(Auth::user(), $args['msg_danger'], 'CREATE');

			return Redirect::to( $this->module['route'].'/edit/'.Crypt::encrypt($project->id) )->with( $args );

		elseif(Projects::existsCode(Input::get('code'), $project->id )):

			$args = array(
				'msg_danger' => array(
					'name' => 'project_code_err',
					'title' => 'Error al editar el proyecto',
					'description' => 'El Código del Proyecto ' . Input::get('code') . ' ya existe.'
					)
				);

			Audits::add(Auth::user(), $args['msg_danger'], 'CREATE');

			return Redirect::to( $this->module['route'].'/edit/'.Crypt::encrypt($project->id) )->with( $args );

   		else:

			$project->name = Input::get('name');
			$project->code = Input::get('code');
			$project->description = Input::get('description');
			$project->status = 'active';
			
			if( $project->save() ):

	   			$sale_order = $project->sale_order;
	   			$sale_order->correlative = Input::get('correlative');
	   			$sale_order->budget = Input::get('budget');
	   			$sale_order->id_client = Input::get('id_client');
	   			$sale_order->id_seller = Input::get('id_seller');
	   			$sale_order->id_project = $project->id;
	   			$sale_order->date = date('Y-m-d', strtotime(Input::get('date')));
	   			$sale_order->period_days = Input::get('period_days');

	   			if($sale_order->save()):

					$args = array(
						'msg_success' => array(
							'name' => 'project_edit',
							'title' => 'Proyecto Editado',
							'description' => 'El proyetco ' . $project->first_name . ' ' . $project->last_name . ' fue editado exitosamente'
							)
						);

					Audits::add(Auth::user(), $args['msg_success'], 'CREATE');

					return Redirect::to( $this->module['route'] )->with( $args );

	   			else:

					$args = array(
						'msg_danger' => array(
							'name' => 'project_edit_err',
							'title' => 'Error al editar el proyecto',
							'description' => 'Hubo un error al editar el proyecto ' . $project->name . ' al momento de generar la orden de compra'
							)
						);

					Audits::add(Auth::user(), $args['msg_danger'], 'CREATE');

					return Redirect::to( $this->module['route'].'/edit/'.Crypt::encrypt($project->id) )->with( $args );

	   			endif;

			else:

				$args = array(
					'msg_danger' => array(
						'name' => 'project_edit_err',
						'title' => 'Error al editar el proyecto',
						'description' => 'Hubo un error al editar el proyecto ' . $project->name
						)
					);

				Audits::add(Auth::user(), $args['msg_danger'], 'CREATE');

				return Redirect::to( $this->module['route'].'/edit/'.Crypt::encrypt($project->id) )->with( $args );

			endif;

	   	endif;

	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /projects/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{

		$args = array(
			'project' => Projects::find( Crypt::decrypt($id) ),
			'module' => $this->module,
			);

		Audits::add(Auth::user(), array(
			'name' => 'project_get_delete',
			'title' => 'Eliminar proyectos',
			'description' => 'Vizualización de proyectos a eliminar'
			), 'READ');

		return View::make('projects.delete')->with($args);

	}

	/**
	 * Show the form for deleting the specified resource.
	 * POST /projects/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete($id)
	{
		$project =  Projects::find( Crypt::decrypt($id) );

		$bool = true;
		$sale_order = $project->sale_order;
		$receipts = $project->sale_order->receipts;
		$tasks = $project->tasks;

		foreach($receipts as $receipt):

			if(!$receipt->delete()):
				$bool = false;
			endif;

		endforeach;

		foreach($tasks as $task):

			$task->users()->sync( array() );

			if(!$task->delete()):
				$bool = false;
			endif;

		endforeach;

		if($bool):

			if($sale_order->delete()):

				if($project->delete()):

					$args = array(
						'msg_success' => array(
							'name' => 'project_delete',
							'title' => 'Proyecto Eliminado',
							'description' => 'El proyetco ' . $project->name . ' (' . $project->code . ') fue eliminada exitosamente'
							)
						);

					Audits::add(Auth::user(), $args['msg_success'], 'DELETE');

					return Redirect::to( $this->module['route'] )->with( $args );

				else:

					$sale_order->restore();
					self::restoreReceipts($receipts);
					self::restoreTasks($tasks);

					$args = array(
						'msg_danger' => array(
							'name' => 'project_delete_err',
							'title' => 'Error al eliminar el proyecto',
							'description' => 'Hubo un error al eliminar el proyecto ' . $project->name . ' (' . $project->last_name . '). Los datos que se eliminaron han sido restaurados.'
							)
						);

					Audits::add(Auth::user(), $args['msg_danger'], 'DELETE');

					return Redirect::to( $this->module['route'].'/delete/'.Crypt::encrypt($project->id) )->with( $args );

				endif;

			else:

				self::restoreReceipts( $receipts );
				self::restoreTasks( $tasks );

				$args = array(
					'msg_danger' => array(
						'name' => 'project_delete_err',
						'title' => 'Error al eliminar el proyecto',
						'description' => 'Hubo un error al eliminar el proyecto ' . $project->name . ' (' . $project->last_name . '). Los datos que se eliminaron han sido restaurados.'
						)
					);

				Audits::add(Auth::user(), $args['msg_danger'], 'DELETE');

				return Redirect::to( $this->module['route'].'/delete/'.Crypt::encrypt($project->id) )->with( $args );

			endif;

		else:

			self::restoreReceipts( $receipts );
			self::restoreTasks( $tasks );

			$args = array(
				'msg_danger' => array(
					'name' => 'project_delete_err',
					'title' => 'Error al eliminar el proyecto',
					'description' => 'Hubo un error al eliminar el proyecto ' . $project->name . ' (' . $project->last_name . '). Los datos que se eliminaron han sido restaurados.'
					)
				);

			Audits::add(Auth::user(), $args['msg_danger'], 'DELETE');

			return Redirect::to( $this->module['route'].'/delete/'.Crypt::encrypt($project->id) )->with( $args );

		endif;

	}

	private static function restoreArray($array){

		foreach( $array as $element ):

			$element->restore();

		endforeach;

		return true;

	}

	private static function restoreReceipts($receipts){

		return self::restoreArray( $receipts);

	}

	private static function restoreTasks($tasks){

		return self::restoreArray( $tasks);

	}

	private function getBreadcumbs(){

		$self_breadcrumb = array(
			'name' => 'Proyectos',
			'route' => '/projects'
			);

		array_push( $this->breadcrumbs, $self_breadcrumb);

		return $this->breadcrumbs;

	}

}
