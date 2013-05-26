function addAttribute() {
	html  = '<tbody id="attribute-row' + attribute_row + '">';
    html += '<tr>';
	html += '    <td class="left"><input type="text" name="product_attribute[' + attribute_row + '][name]" value="" /><input type="hidden" name="product_attribute[' + attribute_row + '][attribute_id]" value="" /></td>';
	html += '    <td class="left">';
		html += '<textarea name="product_attribute[' + attribute_row + '][product_attribute_description][1][text]" cols="40" rows="5"></textarea><img src="view/image/flags/gb.png" title="English" align="top" /><br />';
    	html += '    </td>';
	html += '    <td class="left"><a onclick="$(\'#attribute-row' + attribute_row + '\').remove();" class="button">Remove</a></td>';
    html += ' </tr>';	
    html += '</tbody>';
	
	$('#attribute tfoot').before(html);
	
	attributeautocomplete(attribute_row);
	
	attribute_row++;
}

function attributeautocomplete(attribute_row) {
	$('input[name=\'product_attribute[' + attribute_row + '][name]\']').catcomplete({
		delay: 0,
		source: function(request, response) {
			$.ajax({
				url: 'index.php?route=catalog/attribute/autocomplete&token=31584e27607aec08c83f5510d8fce06b&filter_name=' +  encodeURIComponent(request.term),
				dataType: 'json',
				success: function(json) {	
					response($.map(json, function(item) {
						return {
							category: item.attribute_group,
							label: item.name,
							value: item.attribute_id
						}
					}));
				}
			});
		}, 
		select: function(event, ui) {
			$('input[name=\'product_attribute[' + attribute_row + '][name]\']').attr('value', ui.item.label);
			$('input[name=\'product_attribute[' + attribute_row + '][attribute_id]\']').attr('value', ui.item.value);
			
			return false;
		},
		focus: function(event, ui) {
      		return false;
   		}
	});
}