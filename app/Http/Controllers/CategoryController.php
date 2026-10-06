<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view(
            'admin.categories.index',
            compact('categories')
        );
    }

    public function create()
    {
        return view(
            'admin.categories.create'
        );
    }

    public function store(
        StoreCategoryRequest $request
    ) {
        Category::create(
            $request->validated()
        );

        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                'Catégorie créée avec succès.'
            );
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view(
            'admin.categories.edit',
            compact('category')
        );
    }

    public function update(
        UpdateCategoryRequest $request,
        Category $category
    ) {
        $category->update(
            $request->validated()
        );

        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                'Catégorie modifiée avec succès.'
            );
    }

    public function destroy(Category $category)
    {
        if ($category->tickets()->exists()) {
            return redirect()
                ->route('admin.categories.index')
                ->with(
                    'error',
                    'Impossible de supprimer cette catégorie car elle est utilisée par des tickets.'
                );
        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                'Catégorie supprimée avec succès.'
            );
    }
}