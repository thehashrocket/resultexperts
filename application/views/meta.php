<title>Result Experts</title>


<link href="/assets/blueprint/screen.css" rel="stylesheet" type="text/css"/>
<link href="/assets/blueprint/markup.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/superfish.css" media="screen" />

<script src="https://www.google.com/jsapi?key=ABQIAAAAeeS549Nl03YAz8NROWKITRQ856MVBBouloC2M5fkEhaIXaRYKxQ__SOP192gQng2BBBdg1TuEI8wsg"
        type="text/javascript"></script>
<script type="text/javascript" language="javascript">
    google.load("jquery", "1.6.1");
    google.load("jqueryui", "1.8.13");
</script>

<script type="text/javascript" src="http://jqueryui.com/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="http://jqueryui.com/ui/jquery.ui.accordion.js"></script>

<script type="text/javascript" src="/assets/js/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.tablesorter.pager.js"></script>

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/redmond/jquery-ui.css" rel="stylesheet"
      type="text/css"/>

<script type="text/javascript" src="/assets/js/superfish.js"></script>


<script>


    jQuery(document).ready(function() {
        $("#accordion").accordion({
            autoHeight: false,
            collapsible: true,
            active: true,
            navigation: true
        });
        //getter
        var autoHeight = $(".selector").accordion("option", "autoHeight");
        //setter
        $(".selector").accordion("option", "autoHeight", false);
        $(".stripeMe tr").mouseover(
                function() {
                    $(this).addClass("over");
                }).mouseout(function() {
                    $(this).removeClass("over");
                });
        $(".stripeMe tr:even").addClass("alt");
        $('a').each(function() {
            var a = new RegExp('/' + window.location.host + '/');
            if (!a.test(this.href)) {
                $(this).click(function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    window.open(this.href, '_blank');
                });
            }
        });


    });
</script>