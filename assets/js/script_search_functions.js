$(document).on('ready',function(){
		//$(".filter-option-inner-inner").html('Location');
		$('select[name="location_type"]').on('change',function(){
			var loc_count=$('.location_type').length;

			var tag_length_val=parseFloat($('input[name="tag_length_val"]').val())+1;
			$('input[name="tag_length_val"]').val(tag_length_val);
		//console.log(tag_length_val)
		///$("select[name='location_type'] option[class='selected_class']").length > 0;
		if(loc_count < 3)
		{
			if($(this).find(':selected').hasClass('selected_class') ==false)
			{
  		$(this).find(':selected').addClass('selected_class');
		//$(this).attr('class', 'selected_class')
			$('.display_tags_val').append('<button type="button" class="btn btn-primary location_type tag_location_'+tag_length_val+'" style="margin-left:1%;background-color:#9aa0a6;border-color:#9aa0a6;margin-bottom:1%">'+
  			$(this).val()+' <span class="badge badge-light " onclick="remove_tag_loc('+tag_length_val+')">x</span>'+'</button> ');
  					
				$(".propr_here").append('<input type="hidden" name="location_values[]" value="'+$(this).val()+'::'+$('select[name="location_type"] :selected').attr('class')+'" class="type_loc_'+tag_length_val+'">');
			} 			 
		}
	});	
});

function remove_tag_loc(loc_count)
{
	//console.log($('.type_loc_'+loc_count).val());
// 	console.log(loc_count);
// 	var text=$('input[name="location_values[]"]').val();
// var myArray=[];
// 	myArray = text.split(",");
// console.log(myArray);

// 	const index = myArray.indexOf(loc_count);
// 	console.log(index);

//   myArray.splice(loc_count, 1); // 2nd parameter means remove one item only


// 	//var index =myArray.index(loc_count);

// 	console.log(myArray);
	//console.log(index);
	$('.type_loc_'+loc_count).val('');
	$('.tag_location_'+loc_count).remove();
}

function set_p_type(p_type)
{

	$('input[name="offering_type"]').val(p_type);
}


	