<html>
<title>#@section 'title'</title>
<body>
    <h1>
        #@section 'title'
    </h1>
    this is a layout <br>
    #@section 'content' <br>
    this is a variable: #$n <br/>

    {( if($n > 6){ )}
        #$n
    {( } )}

</body>
</html>
