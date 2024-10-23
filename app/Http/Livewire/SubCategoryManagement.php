<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class SubCategoryManagement extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $limit = '10';
    public $category;
    public $subcategory;

    public $editingID;
    public $editingcategory;
    public $editingsub_category;


    protected $queryString = ['limit', 'search'];

     public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingLimit()
    {
        $this->resetPage();
    }

    public function createCategory()
    {
        $this->validate([
            'category' => ['required', 'unique:categories,category', 'min:1', 'max:50'],
            'subcategory' => ['required', 'unique:sub_categories,sub_category', 'min:2', 'max:50']
        ]);
        try{
        SubCategory::create([
            'category_id' => $this->category,
            'sub_category' => $this->subcategory,
            'slug'=>Str::of(Str::lower($this->subcategory))->slug('-')
        ]);
        $this->reset(['category', 'subcategory']);
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Category Created Successfully',
        ]);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => $e->getMessage(),
            ]);
            return;
        }
    }

    public function edit($id)
    {
        $this->editingID = $id;
        $this->editingcategory = SubCategory::find($id)->category_id;
        $this->editingsub_category= SubCategory::find($id)->sub_category;
    }

    public function cancelEdit()
    {
        $this->reset('editingID', 'editingcategory', 'editingsub_category');
    }

    public function render()
    {
        $categories = Category::all();
        $subcategories = SubCategory::query()
        ->where('sub_category', 'like', '%' . $this->search . '%')
        ->latest()
        ->paginate($this->limit);
        return view('livewire.sub-category-management', [
            'categories' => $categories, 'subcategories' => $subcategories
        ])->layout('components.dashboard.dashboard-master');
    }
}
