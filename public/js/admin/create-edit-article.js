var viewModel = {
	listOfcompetitions: ko.observableArray()
}

ko.applyBindings(viewModel);

$(function(){
	$("#sport_id").on("change", function(){
		var selectedSportId = $(this).find("option:selected").val();

		$.getJSON("http://localhost:55/index.php/api/admin/getSportCompetitions/"+selectedSportId, function(data){
			console.log(data);
			viewModel.listOfcompetitions.removeAll();

			$.each(data, function(index, competition){
				viewModel.listOfcompetitions.push(competition);
			});
		});
	});
});