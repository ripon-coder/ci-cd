<x-app-layout>
    <x-slot name="header">
        <h2 class="page-title">User Posts</h2>
    </x-slot>

    <style>
        .container {
            max-width: 900px;
            margin: 30px auto;
        }

        /* Top Bar */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .top-bar h3 {
            color: #333;
        }

        .btn {
            padding: 10px 16px;
            background: #4CAF50;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
            font-size: 14px;
        }

        .btn:hover {
            background: #43a047;
        }

        /* Table Card */
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #4CAF50;
            color: white;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
        }

        tbody tr {
            border-bottom: 1px solid #eee;
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #f9fafc;
        }

        tbody tr:nth-child(even) {
            background: #fafafa;
        }

        /* Status badge */
        .status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .active {
            background: #e6f4ea;
            color: #2e7d32;
        }

        .inactive {
            background: #fdecea;
            color: #c62828;
        }

        /* Empty state */
        .empty {
            text-align: center;
            padding: 20px;
            color: #777;
        }
    </style>

    <div class="container">

        <!-- Top Bar -->
        <div class="top-bar">
            <h3>All Posts</h3>
            <a href="{{ route('posts.create') }}" class="btn">+ Create</a>
        </div>

        <!-- Table -->
        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Title</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Upvotes</th>
                        <th>Downvotes</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>#{{ $post->id }}</td>
                            <td>{{ optional($post->user)->name ?? 'N/A' }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                            <td>
                                @if($post->is_published->value)
                                    <span class="status active">
                                        {{ $post->is_published->label() }}
                                    </span>
                                @else
                                    <span class="status inactive">
                                        {{ $post->is_published->label() }}
                                    </span>
                                @endif
                            </td>
                            <td><button onClick="document.getElementById('upvote-{{ $post->id }}').submit()">Upvote</button> {{ $post->likes }}</td>
                            <td><button onClick="document.getElementById('downvote-{{ $post->id }}').submit()">Downvote</button> {{ $post->dislikes }}</td>
                            <td>
                                @can('view', $post)
                                    <a href="{{route('posts.edit',$post)}}">Edit</a>
                                @endcan

                            </td>
                            <form id="upvote-{{ $post->id }}" action="{{route('posts.like',$post)}}" method="post" class="hidden">
                                @csrf
                            </form>
                            <form id="downvote-{{ $post->id }}" action="{{route('posts.dislike',$post)}}" method="post" class="hidden">
                                @csrf
                            </form>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty">
                                No posts found 😐
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>