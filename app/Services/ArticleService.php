<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class ArticleService {

    /**
     * Return all articles
     * @return Collection
     */
    public static function getAllArticles()
    {
        try {
            $article = Article::get();

            return $article;
        } catch (\Exception $e) {
            throw ($e);
        }
    }

    /**
     * Create an article
     * @param Request {title, price, status, qty}
     * @return Success
     */
    public static function createArticle($request)
    {
        try {

            if (!is_bool($request['status'])) {
                throw new \Exception('No existe este status', 500);
            }

            $article = new Article;
            $article->fill($request);
            $article->save();

            return $article;
        } catch (\Exception $e) {
            throw ($e);
        }
    }

    /**
     * Edit an article
     * @param Request {title, price, status, qty, id_article}
     * @return Success
     */
    public static function editArticle($data, $id)
    {
        try {

            if (!is_bool($data['status'])) {
                throw new \Exception('No existe este status', 500);
            }

            $article = Article::findOrFail($id);
            $article->fill($data);
            $article->save();

            return $article;
        } catch (\Exception $e) {
            throw ($e);
        }
    }

    /**
     * Delete an article
     * @param Request {id_article}
     * @return Success
     */
    public static function deleteArticle($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->delete();

            return $article;
        } catch (\Exception $e) {
            throw ($e);
        }
    }

    /**
     * Search an article
     * @param Request {id_article}
     * @return Success
     */
    public static function getArticle($id)
    {
        try {
            $article = Article::findOrFail($id);

            return $article;
        } catch (\Exception $e) {
            throw ($e);
        }
    }

    /**
     * Search articles by status
     * @param Request {status}
     * @return Success
     */
    public static function getArticleByStatus($status)
    {
        try {

            if (!is_bool($status)) {
                throw new \Exception('No existe este status', 500);
            }

            $article = Article::where('status', '=', $status)
            ->count();

            return $article;
        } catch (\Exception $e) {
            throw ($e);
        }
    }
}