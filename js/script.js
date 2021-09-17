$(document).ready(function(){

    // like and unlike click
    $(".like, .unlike").click(function(){
        let id = this.id;   // Getting Button id
        let split_id = id.split("_");

        let text = split_id[0];
        let postid = split_id[1];  // postid

        // Finding click type
        let type = 0;
        if(text === "like"){
            type = 1;
        }else {
            type = 0;
        }
        // AJAX Request
        $.ajax({
            url: 'http://untitled.local/like',
            type: 'post',
            data: { postid:postid, type:type},
            dataType: 'json',
            success: function(data){
                let likes = data['likes'];
                let unlikes = data['unlikes'];

                $("#likes_"+postid).text(likes);        // setting likes
                $("#unlikes_"+postid).text(unlikes);    // setting unlikes

                if(type === 1){
                    $("#like_"+postid).css("color","#ffa449");
                    $("#unlike_"+postid).css("color","lightseagreen");
                }

                if(type === 0){
                    $("#unlike_"+postid).css("color","#ffa449");
                    $("#like_"+postid).css("color","lightseagreen");
                }


            }

        });

    });

});