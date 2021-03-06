<?php

class CategoryController extends \BaseController {

	protected $sections = array(
		'index' => 'Todos',
		'create' => 'Nuevo',
		'edit' => 'Editar',
		'delete' => 'Eliminar'
		);

	public function __construct(){

		$this->beforeFilter('auth');

		$this->beforeFilter('categories');

		$this->module = array(
			'route' => '/categories',
			'name' => 'categories',
			'title' => 'Categorias',
			'description' => 'Gestión de Categorias del Sistema',
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
	 * GET /categories
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$args = array(
			'categories' => Categories::all(),
			'module' => $this->module,
			);
		Audits::add(Auth::user(), array(
			'name' => 'category_get_index',
			'title' => 'Categorias',
			'description' => 'Vizualización de Categorias'
			), 'READ');
		return View::make('categories.index')->with($args);
	}

	/**
	 * Display a listing of the resource.
	 * POST /categories
	 *
	 * @return Response
	 */
	public function postIndex()
	{
		$categories = Categories::all();

		$args = array(
			'data' => array()
			);

		foreach($categories as $category):
			$args['data'][] = array(
				'bulk' => '<input type="checkbox" name="bulk[]" value="'.Crypt::encrypt($category->id).'"/>',
				'first_name' => Input::get('bulk'),
				'last_name' => '',
				'categoryname' => $category->categoryname,
				'email' => $category->email,
				'role' => '',
				'status' => $category->status,
				'actions' => ''
				);
		endforeach;

		return Response::json($args);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /categories/create
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$args = array(
			'categories' => Categories::all(),
			'module' => $this->module,
			);
		Audits::add(Auth::user(), array(
			'name' => 'category_get_create',
			'title' => 'Añadir categorias',
			'description' => 'Adición de categorias'
			), 'READ');
		return View::make('categories.create')->with($args);
	}

	/**
	 * Show the form for creating a new resource.
	 * POST /categories/create
	 *
	 * @return Response
	 */
	public function postCreate()
	{

		$category = new Categories();
		$category->description = Input::get('description');
		$category->name = Input::get('name');
		$category->type = 'stock';
		
		if( $category->save() ):

			$args = array(
				'msg_success' => array(
					'name' => 'category_create',
					'title' => 'Categoria agregada',
					'description' => 'La categoria ' . $category->title . ' fue agregada exitosamente'
					)
				);
			Audits::add(Auth::user(), $args['msg_success'], 'CREATE');
			return Redirect::to( $this->module['route'] )->with( $args );

		else:

			$args = array(
				'msg_danger' => array(
					'name' => 'category_create_err',
					'title' => 'Error al agregar la categoria',
					'description' => 'Hubo un error al agregar la categoria ' . $category->title
					)
				);

			Audits::add(Auth::user(), $args['msg_danger'], 'CREATE');
			return Redirect::to( $this->module['route'].'/create' )->with( $args );

		endif;

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /categories/edit/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		$args = array(
			'category' => Categories::find( Crypt::decrypt($id) ),
			'module' => $this->module,
			);
		Audits::add(Auth::user(), array(
			'name' => 'category_get_edit',
			'title' => 'Editar categorias',
			'description' => 'Edición de categorias'
			), 'READ');

		return View::make('categories.edit')->with($args);

	}

	/**
	 * Show the form for editing the specified resource.
	 * POST /categories/edit/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit($id)
	{
		
		$category = Categories::find( Crypt::decrypt($id) );

		$category->description = Input::get('description');
		$category->name = Input::get('name');
		
		if( $category->save() ):

			$args = array(
				'msg_success' => array(
					'name' => 'category_edit',
					'title' => 'Categoria editada',
					'description' => 'La categoria ' . $category->title . ' fue editada exitosamente'
					)
				);

			Audits::add(Auth::user(), $args['msg_success'], 'UPDATE');
			return Redirect::to( $this->module['route'] )->with( $args );

		else:

			$args = array(
				'msg_danger' => array(
					'name' => 'category_edit_err',
					'title' => 'Error al editar la categoria',
					'description' => 'Hubo un error al editar la categoria ' . $category->title
					)
				);

			Audits::add(Auth::user(), $args['msg_danger'], 'UPDATE');
			return Redirect::to( $this->module['route'].'/edit/'.Crypt::encrypt($category->id) )->with( $args );

		endif;

	}

	/**
	 * Show the form for deleting the specified resource.
	 * GET /categories/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{

		$args = array(
			'category' => Categories::find( Crypt::decrypt($id) ),
			'module' => $this->module,
			);
		Audits::add(Auth::user(), array(
			'name' => 'category_get_delete',
			'title' => 'Eliminar categorias',
			'description' => 'Vizualización del categorias a eliminar'
			), 'READ');

		return View::make('categories.delete')->with($args);

	}

	/**
	 * Show the form for deleting the specified resource.
	 * POST /categories/delete/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete($id)
	{
		$category =  Categories::find( Crypt::decrypt($id) );

		if($category->delete()):

			$args = array(
				'msg_success' => array(
					'name' => 'category_delete',
					'title' => 'Categoria eliminada',
					'description' => 'La categoria ' . $category->title . ' fue eliminada exitosamente'
					)
				);

			Audits::add(Auth::user(), $args['msg_success'], 'UPDATE');
			return Redirect::to( $this->module['route'] )->with( $args );

		else:

			$args = array(
				'msg_danger' => array(
					'name' => 'category_delete_err',
					'title' => 'Error al eliminar la categoria',
					'description' => 'Hubo un error al eliminar la categoria ' . $category->title
					)
				);

			Audits::add(Auth::user(), $args['msg_danger'], 'UPDATE');
			return Redirect::to( $this->module['route'].'/delete/'.Crypt::encrypt($category->id) )->with( $args );

		endif;
	}

	private function getBreadcumbs(){

		$self_breadcrumb = array(
			'name' => 'Categorias',
			'route' => '/categories'
			);

		array_push( $this->breadcrumbs, $self_breadcrumb);

		return $this->breadcrumbs;

	}

	public function getSeedscategories(){
		$categories = Categories::all();
		$html = '<pre>';
		foreach($categories as $category):
			$html .= "
		Categories::create( array(
			'id' => $category->id,
			'name' => '$category->name',
			'title' => '$category->title',
			'description' => '$category->description',
			'controller' => '$category->controller',
			));
				";
		endforeach;
		return $html;
	}

	public function getSeedsrolecategories(){
		$categories = RolesCategories::all();
		$html = '<pre>';
		foreach($categories as $category):
			$html .= "
		RolesCategories::create( array(
			'id' => $category->id,
			'id_category' => '$category->id_category',
			'id_role' => '$category->id_role',
			));
				";
		endforeach;
		return $html;
	}

}
