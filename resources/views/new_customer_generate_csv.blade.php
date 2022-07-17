<style>
    #new_customer th:first-child,
    #new_customer td:first-child {
        position: sticky;
        left: 0px;
        background-color: antiquewhite;
    }
</style>
<div class="table table-responsive">
    <table class="table table-bordered table-sm" id="new_customer">
        <thead>
            <tr>
                <th>New Customer</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Store Name</th>
                <th>Contact Person</th>
                <th>Contact Number</th>
                <th>Location</th>
                <th>Location ID</th>
                <th>Detailed Address</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $store_name }}</td>
                <td>{{ $contact_person }}</td>
                <td>{{ $contact_number }}</td>
                <td>{{ $location }}</td>
                <th>{{ $location_id }}</th>
                <td>{{ $detailed_address }}</td>
            </tr>
        </tbody>
    </table>
    

</div>

<button class="btn btn-block btn-success" onclick="exportTableToCSV('{{ $agent_name }} New Customer.csv')">EXPORT DATA</button>

<script>
    function downloadCSV(csv, filename) {
	    var csvFile;
	    var downloadLink;

	    // CSV file
	    csvFile = new Blob([csv], {type: "text/csv"});

	    // Download link
	    downloadLink = document.createElement("a");

	    // File name
	    downloadLink.download = filename;

	    // Create a link to the file
	    downloadLink.href = window.URL.createObjectURL(csvFile);

	    // Hide download link
	    downloadLink.style.display = "none";

	    // Add the link to DOM
	    document.body.appendChild(downloadLink);

	    // Click download link
	    downloadLink.click();
	}

	function exportTableToCSV(filename) {
	    $('.loading').show();
	    var csv = [];
	    var rows = document.querySelectorAll("#new_customer tr");
	    
	    for (var i = 0; i < rows.length; i++) {
	        var row = [], cols = rows[i].querySelectorAll("td, th");
	        
	        for (var j = 0; j < cols.length; j++) 
	            row.push(cols[j].innerText);
	        
	        csv.push(row.join(","));        
	    }

	    // Download CSV file
	    downloadCSV(csv.join("\n"), filename);
	    window.location.replace("{{ route('work_flow') }}");
	}
</script>
