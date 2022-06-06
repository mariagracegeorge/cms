<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Page;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
      $categories = $this->getAllCategories();
      return view('home', ['title' => 'Home Page', 'categories' => $categories]);
    }

    //Get all categories
    public function getAllCategories()
    {
      $categories = DB::table('pages')
                      ->whereNull('parent_id')
                      ->get();
      return $categories;
    }

    /**
     * Show the application category/subcategory/product page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCategoryPage(Request $request)
    {
      $categorySlug = $request->slug;
      $categoryDetails = DB::table('pages')
                           ->where('slug', $categorySlug)
                           ->first();

      $categoryItems = DB::table('pages')
                           ->where('parent_id', $categoryDetails->id)
                           ->get();

      $categories = $this->getAllCategories();
      if($categoryDetails->type == 0 && $categoryDetails->parent_id == null){
        return view('category', ['categoryDetails' => $categoryDetails, 'categoryItems' => $categoryItems, 'title' => $categoryDetails->title, 'categories' => $categories]);
      } else if($categoryDetails->type == 0 && $categoryDetails->parent_id != null){
        $category = DB::table('pages')
                             ->where('id', $categoryDetails->parent_id)
                             ->first();
        return view('sub-category', ['category' => $category, 'categoryDetails' => $categoryDetails, 'categoryItems' => $categoryItems, 'title' => $categoryDetails->title, 'categories' => $categories]);
      } else {
        $subCategory = DB::table('pages')
                             ->where('id', $categoryDetails->parent_id)
                             ->first();
        $category = DB::table('pages')
                            ->where('id', $subCategory->parent_id)
                            ->first();
        return view('product', ['subCategory' => $subCategory, 'category' => $category, 'categoryDetails' => $categoryDetails, 'categoryItems' => $categoryItems, 'title' => $categoryDetails->title, 'categories' => $categories]);
      }
    }

    //Add new page
    public function addNewPage(Request $request)
    {
      $parent_id = isset($request->parent_id) ? $request->parent_id : null;
      $type = isset($request->type) ? $request->type : 0;
      $categories = $this->getAllCategories();
      return view('add-new-page', ['title' => 'Add New Page', 'categories' => $categories, 'parent_id' => $parent_id, 'type' => $type]);
    }

    //Create new page
    public function createNewPage(Request $request)
    {
      $data = $request->all();

      $page_data = [];
      $page_data['title'] = $data['pageName'];
      $page_data['slug'] = $data['pageSlug'];
      $page_data['parent_id'] = $data['parentId'];
      $page_data['type'] = $data['type'];
      $page_data['content'] = $data['pageContent'];

      $pageItem = Page::create($page_data);

      return response()->json( array('status' => 1,  'message' => "The new page has been added successfully"));
    }

    /**
     * Show edit product page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showEditPage(Request $request)
    {
      $productId = $request->id;
      $product = DB::table('pages')
                           ->where('id', $productId)
                           ->first();
      $parent = DB::table('pages')
                          ->where('id', $product->parent_id)
                          ->first();
      $categories = $this->getAllCategories();
      return view('edit-product', ['title' => 'Add New Page', 'categories' => $categories, 'product' => $product, 'parent' => $parent]);
    }

    //Update product
    public function updateProduct(Request $request)
    {
      $data = $request->all();

      $page_data = [];
      $page_data['title'] = $data['productName'];
      $page_data['slug'] = $data['productSlug'];
      $page_data['id'] = $request->id;
      $page_data['content'] = $data['productContent'];

      $product = Page::where('id', $request->id);
      $status = $product->update($page_data);

      return response()->json( array('status' => 1,  'message' => "The product has been updated successfully"));
    }

    //delete product
    public function deleteProduct(Request $request)
    {
      $productId = $request->id;
      $product = DB::table('pages')
                           ->where('id', $productId)
                           ->delete();

      return response()->json( array('status' => 1,  'message' => "The product has been deleted successfully"));
    }

}
