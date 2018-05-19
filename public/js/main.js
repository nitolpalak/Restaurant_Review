$(document).ready(function() {

	$('.formClass').submit( function(e) {
		//alert('on event');
		e.preventDefault();
		var commentid = $(this).data('review-id');
		//alert(commentid);
		submitform(commentid);
/// ekhon ar enter dile page reload khabe na :) 
/// ar kichu?
//respect boss
//cha lois

	} )
});

function comment(commentid){
	$("#commentFormDiv"+commentid).show();
}

function submitform(commentid){
	$("#commentFormDiv"+commentid).hide();

	var comment = $("#name"+commentid).val();
	var url1 = url + "/ajax";
	console.log(url);
	console.log(commentid+" "+comment);
	$.ajax({
		type: "POST",
		url: url1,
		data: {
			review_id:commentid,
			comment:comment
		},
		success: function(data){

			//var result = data.responseText; /// It is the data returned by your controller
			var div='<div id=commentedDiv'+data.comment_id+'></div>';
			var userDiv='<div id=userDiv'+data.uid+'>'+'<h3>'+data.uid+'</h3>'+'</div>';
			var commentPara='<p id=commentPara'+data.comment_id+'>'+comment+'</p>';
			var btnDelete='<button id=dlt'+data.comment_id+' class="button-delete" data-comment-id='+data.comment_id+'>Remove</button>';
			$("#comments"+commentid).append(div);
			$("#commentedDiv"+data.comment_id).append(userDiv);
			$("#commentedDiv"+data.comment_id).append(commentPara);
			$("#commentPara"+data.comment_id).append(btnDelete);
			console.log("success: "+data);
		},
		error:function(data){
			console.log("Error: "+data);
		}

	});
	// console.log(url1);
}

$(document).on('click' , '.button-delete' , function(e){
    e.preventDefault();
    var id = $(this).data('comment-id');
    var url1= url + "/ajaxDelete/"+id;
    // var url = 'ajaxTestDelete/'+id;
    console.log(" => "+id);
    $.ajax({
        type:'GET',
        url:url1,
        success:function(data){
            console.log("Success" , data);
            $('#commentedDiv'+id).remove();
            // $('#'+id).remove();
            //alert(data.success);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});
    

function test(id){
	console.log(id);
	$.ajax({
		type: "GET",
		url: "/Restaurant/public/ajax/"+id,
		success: function (data) {
        	console.log('response-> '+data);   
    	}
	});

}
