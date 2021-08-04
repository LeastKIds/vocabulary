<html>
    <head></head>
    <body>
        <form action="voca/vocabulary/store" method="POST">
            <input type="title" name="title">
            <input type="user_id" name="user_id">
            <input type="public" name="public">
            @csrf
            <button>전송</button>
        </form>
    </body>
</html>