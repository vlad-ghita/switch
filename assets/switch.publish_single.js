;(function($, undefined){

	Symphony.Language.add({
		'Yes': false,
		'No': false
	});

	$(document).ready(function(){

		var on = Symphony.Language.get('Yes');
		var off = Symphony.Language.get('No');

		// convert Checkboxes to Switches

		$("div.field-checkbox").each(function(){
			var $label = $(this).find('label:eq(0)');
			var $input = $label.find('input[type="checkbox"]').clone().attr('style', 'display:none');
			var $swtich = $('<div></div>').attr({
				'class': 'switch switch-success'+($input.attr('checked') ? ' active' : ''),
				'data-on': on,
				'data-off': off,
				'data-checkbox': $input.attr('name')
			});

			var text = $label.children().remove().end().text();
			$label.text('');
			$label
				.append($input)
				.append($('<span></span>').text(text))
				.append($swtich);

			$swtich.switchbtn($swtich.data());
		});
	});

})(jQuery);
