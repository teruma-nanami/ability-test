<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index() {
        return view ('index');
    }

    public function confirm(ContactRequest $request) {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'areaNumber', 'localNumber', 'subscNumber', 'address', 'building', 'category_id', 'detail']);
        $tel = $contact['areaNumber'] . $contact['localNumber'] . $contact['subscNumber'];
        $contact['tel'] = $tel;
        $genderValue = $contact['gender'];
        $genderText = '';
        switch ($genderValue) {
            case '1':
                $genderText = '男性';
                break;
            case '2':
                $genderText = '女性';
                break;
            case '3':
                $genderText = 'その他';
                break;
        }
        $contact['genderText'] = $genderText;
        $categoryValue = $contact['category_id'];
        $categoryText = '';
        switch ($categoryValue) {
            case '1':
                $categoryText = '商品のお届けについて';
                break;
            case '2':
                $categoryText = '商品の交換について';
                break;
            case '3':
                $categoryText = '商品トラブル';
                break;
            case '4':
                $categoryText = 'ショップへのお問い合わせ';
                break;
            case '5':
                $categoryText = 'その他';
                break;
        }
        $contact['categoryText'] = $categoryText;
        return view('confirm', compact('contact'));
    }

    public function store(Request $request) {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'category_id', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }
    public function destroy(Request $request) {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }
    public function search(Request $request)
    {
        $contacts = Contact::with('category')
                  ->CategorySearch($request->category_id)
                  ->GenderSearch($request->gender)
                  // ->DateSearch($request->date)
                  ->KeywordSearch($request->keyword)
                  ->paginate(7)
                  ->appends($request->except('page'));
        $categories = Category::all();

        foreach ($contacts as $contact) {
          $genderValue = $contact->gender;
          $genderText = '';
          switch ($genderValue) {
            case '1':
                $genderText = '男性';
                break;
            case '2':
                $genderText = '女性';
                break;
            case '3':
                $genderText = 'その他';
                break;
          }
          $contact->genderText = $genderText;
    
          $categoryValue = $contact->category_id;
          $categoryText = '';
          switch ($categoryValue) {
              case '1':
                  $categoryText = '商品のお届けについて';
                  break;
              case '2':
                  $categoryText = '商品の交換について';
                  break;
              case '3':
                  $categoryText = '商品トラブル';
                  break;
              case '4':
                  $categoryText = 'ショップへのお問い合わせ';
                  break;
              case '5':
                  $categoryText = 'その他';
                  break;
          }
          $contact->categoryText =$categoryText;
        }
        return view('/admin', compact('contacts', 'categories'));
    }
}
