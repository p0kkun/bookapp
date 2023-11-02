<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Book App</title>
    <link rel="stylesheet" href="{{ asset('css/books.css') }}">
    <link rel="stylesheet" href="{{ asset('css/searchbooks.css') }}">
</head>

<div class="searcharea">
    <div class="title">検索フォーム</div>

    <div class="searchform">
        <form action="{{ route('books.search') }}" method="POST">
            @csrf
            <div class="searchBook">
                <div class="search-group">
                    <input type="text" name="search_title" placeholder="タイトルを入力" value="{{ old('search_title') }}"
                        class="@error('search_title') search-with-error @enderror">
                    @error('search_title')
                        <span class="searcherror">{{ $message }}</span>
                    @enderror
                </div>

                <!-- 著者名の入力フィールド-->
                <div class="search-group">
                    <input type="text" name="search_author" placeholder="著者名を入力" value="{{ old('search_author') }}"
                        class="@error('search_author') search-with-error @enderror">
                    @error('search_author')
                        <span class="searcherror">{{ $message }}</span>
                    @enderror
                </div>

                <div class="search-group">
                    <input type="number" name="search_price" value="{{ old('search_price') }}" placeholder="価格を入力"
                        class="@error('search_price') search-with-error @enderror">

                    <select name="price_option">
                        <option value="exact">完全一致</option>
                        <option value="above">以上</option>
                        <option value="below">未満</option>
                    </select>
                    @error('search_price')
                        <span class="searcherror">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" value="検索" class="search">検索</button>
                <a href="{{ route('books.index') }}" class="btn btn-default reset-button">リセット</a>
            </div>
        </form>
    </div>
    
    @if (!empty($searchConditions))
        <div class="search-conditions">
            <h3>検索条件:</h3>
            <ul>
                @if (!empty($searchConditions['search_title']))
                    <li>タイトル: {{ $searchConditions['search_title'] }}</li>
                @endif
                @if (!empty($searchConditions['search_author']))
                    <li>著者名: {{ $searchConditions['search_author'] }}</li>
                @endif
                @if (isset($searchConditions['search_price']))
                    <li>価格: {{ $searchConditions['search_price'] }}
                        @if ($searchConditions['price_option'] == 'above')
                            以上
                        @endif
                        @if ($searchConditions['price_option'] == 'below')
                            以下
                        @endif
                        @if ($searchConditions['price_option'] == 'exact')
                            ちょうど
                        @endif
                    </li>
                @endif
            </ul>
        </div>
    @endif

    <div>
        @if (isset($searchbooks))
            @if ($searchbooks->isEmpty())
                <p class="nothing">検索結果0件</p>
            @else
                <div class="searchbookview">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>タイトル</th>
                                <th>著者</th>
                                <th>価格</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($searchbooks as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->price }} 円</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
    </div>
    @endif
</div>

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
