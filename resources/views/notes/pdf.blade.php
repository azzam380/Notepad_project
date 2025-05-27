<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>My Notes PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #333;
            padding: 20px;
            font-size: 14px;
        }
        h1 {
            text-align: center;
            color: #008b8b;
        }
        .note {
            border: 1px solid #00bcd4;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .note h3 {
            margin: 0 0 10px;
            color: #006666;
        }
        .note p {
            margin: 0;
        }
    </style>
</head>
<body>
    <h1>🧠 My Notes</h1>

    @foreach($notes as $note)
        <div class="note">
            <h3>{{ $note->title }}</h3>
            <p>{{ $note->content }}</p>
        </div>
    @endforeach

    @if($notes->isEmpty())
        <p style="text-align: center; color: gray;">No notes available.</p>
    @endif
</body>
</html>
