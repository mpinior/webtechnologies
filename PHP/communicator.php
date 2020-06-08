<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="communicator.js"></script>
<div>
    <div id="communicatorContent">

    </div>
    <form id="communicatorForm">
        <input type="checkbox" name="activator" onclick="getData(0)"> Aktywować komunikator?<br>
        Username: <textarea name="username" cols="8" rows="1"></textarea><br/>
        <textarea name="message" cols="40" rows="5"></textarea><br/>
        <button type="button" onclick="send()">Wyślij</button>
        <?php
            $blog=$_GET['nazwa'];
            echo "<input type=\"hidden\" name=\"blog\" value=$blog>";
        ?>
    </form>
</div>
