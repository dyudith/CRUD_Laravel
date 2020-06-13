<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of all articles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $result = ArticleService::getAllArticles();
            return response()->json(['data' => $result], 200);
        } catch (\Exception $e) {

            \Log::critical('Exception: ' . $e);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Create an article.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {

            $data = $request->all();

            if ($data['status'] == 'active'){
                $data['status'] = true;
            } else if ($data['status'] == 'inactive'){
                $data['status'] = false;
            }

            DB::beginTransaction();
            $result = ArticleService::createArticle($data);
            DB::commit();

            return response()->json(['data' => $result], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::critical('Exception: ' . $e);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Edit an article.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_article)
    {
        try {
            
            $data = $request->all();

            if ($data['status'] == 'active'){
                $data['status'] = true;
            } else if ($data['status'] == 'inactive'){
                $data['status'] = false;
            }

            DB::beginTransaction();
            $result = ArticleService::editArticle($data, $id_article);
            DB::commit();

            return response()->json(['data' => $result], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::critical('Exception: ' . $e);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Delete an article.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id_article)
    {
        try {

            DB::beginTransaction();
            $result = ArticleService::deleteArticle($id_article);
            DB::commit();
            return response()->json(['data' => $result], 200);
        } catch (\Exception $e) {

            DB::rollBack();
            \Log::critical('Exception: ' . $e);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Search an article.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($id_article)
    {
        try {

            $result = ArticleService::getArticle($id_article);
            return response()->json(['data' => $result], 200);
        } catch (\Exception $e) {

            \Log::critical('Exception: ' . $e);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Search articles by status.
     *
     * @return \Illuminate\Http\Response
     */
    public function status($status)
    {
        try {

            if($status == 'active'){
                $status=true;
            } else if ($status == 'inactive') {
                $status=false;
            }
            
            $result = ArticleService::getArticleByStatus($status);
            return response()->json(['count' => $result], 200);
        } catch (\Exception $e) {

            \Log::critical('Exception: ' . $e);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    
}
