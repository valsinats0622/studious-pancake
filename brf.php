<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var arr = [];

        $("#btn").on("click", function(e){
            var userinput = $("#userinput").val();
                    
            var info = {
                "search" : userinput
            };

            $("#loader").load("brfScript.php", {"data": info,"action":"search"}, function(e){
                console.log(e);

                var jsontest = jQuery.parseJSON(e);
                arr["results"] = jsontest;
                //console.log(arr);
                var strHtml = "<ul id='linklist'>";
                for(var i=0;i<arr["results"].length;i++){
                    console.log(arr["results"][i]);
                    strHtml += '<li class="resultlink" data-numb="' + arr["results"][i]["numb"] + '" data-link="' + arr["results"][i]["id"] + '" data-name="' + arr["results"][i]["name"] + '">' + arr["results"][i]["name"] + '</li>'
                }
                strHtml += "</ul>";
                console.log(strHtml);
                $("#searchresults").html(strHtml);
            });
        });

        $(document).on("click",".resultlink",function(){
            console.log($(this).data("link"), $(this).data("numb"), $(this).data("name"));
            $("#loader").load("brfScript.php", {"url" : $(this).data("link"),"action":"getbrf", "numb" : $(this).data("numb"), "brfname" : $(this).data("name")}, function(e){
                console.log(e);
                var json  = jQuery.parseJSON(e);
                //console.log(json[0]["registrering_ar"]);
                $("#display").val("Organistations Nummer: " + json[0]["orgNr"] + "\r\n" + "Regår: " + json[0]["registrering_ar"] + "\r\n" + "Komun: " + json[0]["komun"] + "\r\n" + "Status: " + json[0]["status"] + "\r\n" + "Lägenheter: " + json[0]["lagenheter"] + "\r\n" + "Följare: " + json[0]["foljare"] + "\r\n" + "Uppdaterad: " + json[0]["uppdaterad"] + "\r\n" + "Avgift per km årligen: " + json[0]["avgiftKm"] + "\r\n" + "Timestamp: " + json[0]["timestamp"]);

                //$("#display").val(e); 
            });
        });    
    });
</script>
<style>
.resultlink{
    cursor:pointer;
}
</style>

    <input type="text" name="userinput" id="userinput"><br>
    <button id="btn">Search</button><br>
    <div id="searchresults"></div>
    <textarea id="display" rows="50" cols="100"></textarea><br>
    <div id="loader" style="visibility: hidden;"></div>
   


