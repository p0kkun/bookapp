<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Book App</title>
    <link rel="stylesheet" href="{{ asset('css/books.css') }}">
</head>

<div class="title">書籍一覧</div>
<div class="bookview">
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>タイトル</th>
            <th>著者</th>
            <th>価格</th>
            <th class="operation-column"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->price }} 円</td>
                <td>
                    <form action="/books/{{ $book->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
  <!-- 本の追加フォーム -->
  <div class="fix">
  <div class="addBook">
    <form action="/books" method="POST">
        @csrf

        <div class="addBook input-group">
            <input type="text" name="title" placeholder="Title" value="{{ old('title') }}" 
                   class="@error('title') input-with-error @enderror">
            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="addBook input-group">
            <input type="text" name="author" placeholder="Author" value="{{ old('author') }}" 
                   class="@error('author') input-with-error @enderror">
            @error('author')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="addBook input-group">
            <input type="text" name="price" placeholder="Price" value="{{ old('price') }}" 
                   class="@error('price') input-with-error @enderror">
            @error('price')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="addBook addform">追加</button>
    </form>
</div>
</div>