<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AuthController extends Controller
{
  public function index() {
    $contacts = Contact::all();
    $contacts = Contact::Paginate(7);
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

    return view('admin', compact('contacts'));
  }
}
