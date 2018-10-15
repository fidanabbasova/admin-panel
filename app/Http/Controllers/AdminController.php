<?php

// ARTIQ VARIABLE SIL -> EVEZLE

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

use App\Article;

use App\Comment;

use App\User;

use App\Http\Requests\ArticleFormRequest;

use App\Http\Requests\CategoryFormRequest;

class AdminController extends Controller
{
    public function indexArticles() {
        $articles = Article::orderBy('id', 'desc')->paginate(5);
        $categories = Category::all();
        return view('admin.articles', compact('articles', 'categories'));
    }

    public function storeArticle( ArticleFormRequest $request ) {
        $article = new Article( array(
            'title' => $request->get('articleTitle'),
            'content' => $request->get('articleContent'),
            'category_id' => $request->get('category')
        ));
        $article->save();
        return redirect("admin/article/{$article->id}")->with('status', 'Məqalə uğurla əlavə olundu.');
    }

    public function showArticle($id) {
        $article = Article::find($id);
        $comments = Comment::where('article_id', $id)->get();
        $categories = Category::all();
        return view('admin.articleShow', compact('article', 'comments', 'categories'));
    }

    public function editModalArticle($id) {
        $article = Article::find($id);
        $comments = Comment::where('article_id', $id)->get();
        $categories = Category::all();
        return view('admin.articleEdit', compact('article', 'comments', 'categories'));
    }

    public function editArticle($id, ArticleFormRequest $request) {
        $article = Article::find($id);
        $article->title = $request->get('articleTitle');
        $article->content = $request->get('articleContent');
        $article->category_id  = $request->get('category');
        $article->save();
        return redirect("admin/article/{$id}")->with('status', 'Məqalə uğurla yeniləndi.');
    }

    public function deleteModalArticle($id) {
        $article = Article::find($id);
        $comments = Comment::where('article_id', $id)->get();
        $categories = Category::all();
        return view('admin.articleDelete', compact('article', 'comments', 'categories'));
    }

    public function deleteArticle($id) {
        $article = Article::find($id);
        $article->delete();
        return redirect('admin/articles')->with('status', 'Məqalə uğurla silindi.');
    }

    public function deleteModalComment($id, $comment_id) {
        $article = Article::find($id);
        $comments = Comment::where('article_id', $id)->get();
        $categories = Category::all();
        $commentDelete = Comment::find($comment_id);
        return view('admin.commentDelete', compact('article', 'comments', 'commentDelete', 'categories'));
    }

    public function deleteComment($id, $comment_id) {
        $commentDelete = Comment::find($comment_id);
        $commentDelete->delete();
        return redirect("admin/article/{$id}")->with('status', 'Şərh uğurla silindi.');
    }

    public function indexCategories() {
        $categories = Category::orderBy('id', 'desc')->paginate(5);
        return view('admin.categories', compact('categories'));
    }

    public function storeCategory(CategoryFormRequest $request) {
        $category = new Category( array(
            'description' => $request->get('description')
        ));
        $category->save();
        return redirect('admin/categories')->with('status', 'Kateqoriya uğurla əlavə olundu.');
    }

    public function showCategory($id) {
        $category = Category::find($id);
        $articles = Article::with('category')->where('category_id',  $id)->paginate(5);
        return view('admin.categoryShow', compact('articles', 'category'));
    }

    public function editModalCategory($id) {
        $category = Category::find($id);
        $articles = Article::where('category_id', $id)->get();
        return view('admin.categoryEdit', compact('articles', 'category'));
    }

    public function editCategory($id, CategoryFormRequest $request) {
        $category = Category::find($id);
        $category->description = $request->get('description');
        $category->save();
        return redirect("admin/category/{$id}")->with('status', 'Kateqoriya uğurla yeniləndi.');
    }

    public function deleteModalCategory($id) {
        $category = Category::find($id);
        $articles = Article::where('category_id', $id)->get();
        return view('admin.categoryDelete', compact('category', 'articles'));
    }

    public function deleteCategory($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/categories')->with('status', 'Kateqoriya uğurla silindi.');
    }

    public function indexUsers() {
        $users = User::orderBy('id', 'desc')->paginate(5);
        return view('admin.users', compact('users'));
    }

    public function showUser($id) {
        $user = User::find($id);
        return view('admin.userShow', compact('user'));
    }

    public function deleteModalUser($id) {
        $user = User::find($id);
        return view('admin.userDelete', compact('user'));
    }

    public function deleteUser($id) {
        $user = Article::find($id);
        $user->delete();
        return redirect('admin/users')->with('status', 'İstifadəçi uğurla silindi.');
    }
}

