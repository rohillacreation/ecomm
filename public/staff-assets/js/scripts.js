function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);



//multiple selection(testselect1)
document.multiselect('#testSelect1')
		.setCheckBoxClick("checkboxAll", function(target, args) {
			console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
		})
		.setCheckBoxClick("1", function(target, args) {
			console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
		});

	function enable() {
		document.multiselect('#testSelect1').setIsEnabled(true);
	}

	function disable() {
		document.multiselect('#testSelect1').setIsEnabled(false);
	}


//(testselect2)
	document.multiselect('#testSelect2')
		.setCheckBoxClick("checkboxAll", function(target, args) {
			console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
		})
		.setCheckBoxClick("1", function(target, args) {
			console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
		});

	function enable() {
		document.multiselect('#testSelect2').setIsEnabled(true);
	}

	function disable() {
		document.multiselect('#testSelect2').setIsEnabled(false);
	}


	//(testselect for teacher)
	document.multiselect('#testSelect3')
		.setCheckBoxClick("checkboxAll", function(target, args) {
			console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
		})
		.setCheckBoxClick("1", function(target, args) {
			console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
		});

	function enable() {
		document.multiselect('#testSelect3').setIsEnabled(true);
	}

	function disable() {
		document.multiselect('#testSelect3').setIsEnabled(false);
	}




	
	var dates = [];
$(document).ready(function () {
$("#cal").daterangepicker();
$("#cal").on("apply.daterangepicker", function (e, picker) {
e.preventDefault();
const obj = {
  key: dates.length + 1,
  start: picker.startDate.format("MM/DD/YYYY"),
  end: picker.endDate.format("MM/DD/YYYY")
};
dates.push(obj);
showDates();
});
$(".remove").on("click", function () {
removeDate($(this).attr("key"));
});
});
function showDates() {
$("#ranges").html("");
$.each(dates, function () {
const el =
  "<li>" +
  this.start +
  "-" +
  this.end +
  "<button class='remove' onClick='removeDate(" +
  this.key +
  ")'>-</button></li>";
$("#ranges").append(el);
});
}
function removeDate(i) {
dates = dates.filter(function (o) {
return o.key !== i;
});
showDates();
}

