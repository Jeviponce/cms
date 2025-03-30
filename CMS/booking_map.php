<?php
require_once('includes/dbcon.php');
$lvl = $_SESSION['lvl'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$occupied_graves = [];
$grave_descriptions = []; // Array to store descriptions

$sql = "SELECT graveNum, description FROM schedule_list"; // Assuming 'description' is a column in your 'schedule_list' table
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $occupied_graves[] = $row['graveNum'];
        $grave_descriptions[$row['graveNum']] = $row['description']; // Store the description indexed by graveNum
    }
    mysqli_free_result($result);
} else {
    die("Query failed: " . mysqli_error($conn));
}

mysqli_close($conn);
?>


<style>

    #helpdesk.helpdesk {
        background-color: #FF6364 !important; /* Override other styles */
        border: 2px solid white !important;    /* Emphasize the border */
        color: black;
    }

    #office.office {
        background-color: #4ECCFE !important; /* Override other styles */
        border: 2px solid white !important;    /* Emphasize the border */
        color: black;
    }

    #door.doorColor {
        background-color: #FEFE62 !important; /* Override other styles */
        border: 2px solid white !important;    /* Emphasize the border */
        color: black;
    }


    .grave {
        width: 100px;
        height: 100px;
        border: 1px solid #000;
        display: inline-block;
        margin: 5px;
        text-align: center;
        line-height: 100px;
    }

    .available {
        background-color: green;
        color: white;
    }
    .selected {
        border: 3px solid yellow; /* Highlight selected */
    }

    .legend {
        font-family: Arial, sans-serif;
        margin: 10px;
    }
    .legend-item {
        display: flex;
        align-items: center;
        margin: 5px 0;
    }
    .color-box {
        width: 20px;
        height: 20px;
        margin-right: 10px;
        border: 1px solid #000;
    }
    .occupied {
        background-color: red;
    }
    .entrance-exit {
        background-color: yellow;
    }
    .available-slot {
        background-color: #efefef;
    }

    /* Highlight the table cell */
    .highlight {
        background-color: #ADFF2F !important;
        color: black;
        font-weight: bold;
    }


</style>

<style type="text/css">
    .breadcrumb {
        background-color: #f4f4f4; /* Light grey background */
        padding: 10px; /* Space inside the breadcrumb */
        border-radius: 5px; /* Rounded corners */
    }

    .breadcrumb-item {
        display: inline-block;
        font-size: 16px;
        color: #333; /* Dark text color */
    }

    .breadcrumb-item.active {
        font-weight: bold; /* Highlight the active item */
    }

    .breadcrumb-item span {
        color: #004AD6; /* Highlight the 'DASHBOARD' in blue */
    }

    #myTable {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-family: Arial, sans-serif;
    }
</style>
<!-- Add Bootstrap CSS and JS -->
<style>
/* Style for the highlighted td with location marker */
.highlight {
    background-color: yellow; /* Add a background color to highlight */
    position: relative;
}

/* Add the location marker icon using a pseudo-element */
.highlight::before {
    content: "📍"; /* Using a map pin emoji */
    position: absolute;
    top: 5px;
    left: 5px;
    font-size: 20px;
}



</style>

<style>
    .grave {
        width: 100px;
        height: 100px;
        border: 1px solid #000;
        display: inline-block;
        margin: 5px;
        text-align: center;
        line-height: 100px;
    }
    .occupied {
        background-color: red !important;
       cursor: none;
       
    }
    .available {
        background-color: green;
        color: white;
    }
    .selected {
        border: 3px solid yellow; /* Highlight selected */
    }

  .legend {
        font-family: Arial, sans-serif;
        margin: 10px;
    }
    .legend-item {
        display: flex;
        align-items: center;
        margin: 5px 0;
    }
    .color-box {
        width: 20px;
        height: 20px;
        margin-right: 10px;
        border: 1px solid #000;
    }
    .occupied {
        background-color: red;
    }
    .entrance-exit {
        background-color: yellow;
    }
    .available-slot {
        background-color: #efefef;
    }
</style>

<style type="text/css">
    .breadcrumb {
        background-color: #f4f4f4; /* Light grey background */
        padding: 10px; /* Space inside the breadcrumb */
        border-radius: 5px; /* Rounded corners */
    }

    .breadcrumb-item {
        display: inline-block;
        font-size: 16px;
        color: #333; /* Dark text color */
    }

    .breadcrumb-item.active {
        font-weight: bold; /* Highlight the active item */
    }

    .breadcrumb-item span {
        color: #004AD6; /* Highlight the 'DASHBOARD' in blue */
    }

        #myTable {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-family: Arial, sans-serif;
    }
</style>

<style>
    /* Style the custom "Upload File" button */
    .upload-btn {
        display: inline-block;
        padding: 8px 15px;
        background-color: #007bff;
        color: white;
        border-radius: 4px;
        text-align: center;
        cursor: pointer;
    }

    .upload-btn:hover {
        background-color: #0056b3;
    }

    /* Style the file name display */
    span {
        display: block;
        margin-top: 8px;
       
    }

        /* Horizontal layout for Gender Radio Buttons */
    .gender-buttons {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .gender-buttons input[type="radio"] {
        margin-right: 5px;
    }

    .gender-buttons label {
        display: inline-block;
    }
</style>

<div class="container-fluid">
   
    <div class="row">
        <!--Profile Form-->

        <div class="col-xl-8">
            <!-- Profile picture card-->
            <div class="mb-3">
               <input type="hidden" id="search-input" placeholder="Search for a value to highlight">
               <div class="legend">
            <h3>Color Legend </h3>
            <div class="legend-item">
                <div class="color-box occupied"></div>
                <span>Occupied</span>&nbsp;&nbsp;&nbsp;
                <div class="color-box entrance-exit"></div>
                <span>Entrance/Exit</span>&nbsp;&nbsp;&nbsp;
                  <div class="color-box available-slot"></div>
                <span>Available Slot</span>
            </div>
        </div> 
              <table id="gravesDiagram">
            <tr>
                <td id="grave-1" data-name="1">1</td>
                <td id="grave-2" data-name="2">2</td>
                <td id="grave-3" data-name="3">3</td>
                <td id="grave-4" data-name="4">4</td>
                <td id="grave-5" data-name="5">5</td>
                <td id="grave-6" data-name="6">6</td>
                <td id="grave-7" data-name="7">7</td>
                <td id="grave-8" data-name="8">8</td>
                <td id="grave-9" data-name="9">9</td>
                <td id="grave-10" data-name="10">10</td>
            </tr>

            <tr>
                <td id="grave-11" data-name="11">11</td>
                <td id="grave-12" data-name="12">12</td>
                <td id="grave-131" data-name="13">13</td>
                <td id="grave-14" data-name="14">14</td>
                <td id="grave-15" data-name="15">15</td>
                <td id="grave-16" data-name="16">16</td>
                <td id="grave-17" data-name="17">17</td>
                <td id="grave-18" data-name="18">18</td>
                <td id="grave-19" data-name="19">19</td>
                <td id="grave-20" data-name="20">20</td>
            </tr>

            <tr>
                <!--Door-->
                <td id="door" class="doorColor non-clickable" data-name="101">
                    <span class="icon-label">
                        <i class="fa-solid fa-door-open"></i><span class="badge badge-danger">G5</span>
                    </span>
                </td>
                <td class="space">🟦</td>
                <td class="space">🟦</td>
                <td class="space">🟦</td>
                <td class="space">📍</td>
                <td class="space">PA1</td>
                <td class="space">🟦</td>
                <td class="space">🟦</td>
                <td class="space">🟦</td>
                <td id="door" class="doorColor non-clickable" data-name="101">
                    <i class="fa-solid fa-door-open"></i><span class="badge badge-danger">G4</span>
                </td>

            </tr>

            <tr>
                <td id="grave-21" data-name="21">21</td>
                <td id="grave-22" data-name="22">22</td>
                <td id="grave-23" data-name="23">23</td>
                <td id="grave-24" data-name="24">24</td>
                <td id="grave-25" data-name="25">25</td>
                <td id="grave-26" data-name="26">26</td>
                <td id="grave-27" data-name="27">27</td>
                <td class="space">🟦</td>
                <td id="grave-28" data-name="28">28</td>
                <td id="grave-29" data-name="29">29</td>

            </tr>

            <tr>
                <td id="grave-30" data-name="30">30</td>
                <td id="grave-31" data-name="31">31</td>
                <td id="grave-32" data-name="32">32</td>
                <td id="grave-33" data-name="33">33</td>
                <td id="grave-34" data-name="34">34</td>
                <td id="grave-35" data-name="35">35</td>
                <td id="grave-36" data-name="36">36</td>
                <td class="space">🟦</td>
                <td id="grave-37" data-name="37">37</td>
                <td id="grave-38" data-name="38">38</td>

            </tr>

            <tr>
                <!--door-->
                <td id="helpdesk" class="helpdesk non-clickable" data-name="101">
                    <span class="icon-label">
                        <i class="fa-solid fa-tents"></i><span class="badge badge-danger">H2</span>
                    </span>
                </td>
                <td class="space">🟦</td>
                <td class="space">🟦</td>
                <td class="space">🟦</td>
                <td class="space">📍</td>
                <td class="space">PA2</td>
                <td class="space">🟦</td>
                <td class="space">🟦</td>
                <td class="space">🟦</td>
                <td id="door" class="doorColor non-clickable" data-name="101">
                    <i class="fa-solid fa-door-open"></i><span class="badge badge-danger">G3</span>
                </td>

            </tr>

            <tr>
                <td id="grave-39" data-name="39">39</td>
                <td id="grave-40" data-name="40">40</td>
                <td id="grave-41" data-name="41">41</td>
                <td id="grave-42" data-name="42">42</td>
                <td id="grave-43" data-name="43">43</td>
                <td id="grave-44" data-name="44">44</td>
                <td id="grave-45" data-name="45">45</td>
                <td class="space">🟦</td>
                <td id="grave-46" data-name="46">46</td>
                <td id="grave-47" data-name="47">47</td>
            </tr>
            <tr>
                <td id="grave-48" data-name="48">48</td>
                <td id="grave-49" data-name="49">49</td>
                <td id="grave-50" data-name="50">50</td>
                <td id="grave-51" data-name="51">51</td>
                <td id="grave-52" data-name="52">52</td>
                <td id="grave-53" data-name="53">53</td>
                <td id="grave-54" data-name="54">54</td>
                <td class="space">🟦</td>
                <td id="grave-55" data-name="55">55</td>
                <td id="grave-56" data-name="56">56</td>
            </tr>

            <tr>
                <td id="helpdesk" class="helpdesk non-clickable" data-name="101">
                    <span class="icon-label">
                        <i class="fa-solid fa-tents"></i><span class="badge badge-danger">H1</span>
                    </span>
                </td>
                <td class="space">🟦</td>
                <td class="space">🟦</td>
                <td class="space">🟦</td>
                <td class="space">📍</td>
                <td class="space">PA3</td>
                <td class="space">🟦</td>
                <td class="space">🟦</td>
                <td class="space">🟦</td>
                <td id="door" class="doorColor non-clickable" data-name="101">
                    <i class="fa-solid fa-door-open"></i><span class="badge badge-danger">G1</span>
                </td>

            </tr>

            <tr>
                <td id="grave-57" data-name="57">57</td>
                <td id="grave-58" data-name="58">58</td>
                <td id="grave-59" data-name="59">59</td>
                <td id="grave-60" data-name="60">60</td>
                <td id="grave-61" data-name="61">61</td>
                <td id="grave-62" data-name="62">62</td>
                <td id="grave-63" data-name="63">63</td>
                <td class="space">🟦</td>
                <td id="grave-64" data-name="64">64</td>
                <td id="grave-65" data-name="65">65</td>
            </tr>

            <tr>
                <td id="grave-66" data-name="66">66</td>
                <td id="grave-67" data-name="67">67</td>
                <td id="grave-68" data-name="68">68</td>
                <td id="grave-69" data-name="69">69</td>
                <td id="grave-70" data-name="70">70</td>
                <td id="grave-71" data-name="71">71</td>
                <td id="grave-72" data-name="72">72</td>
                <td class="space">🟦</td>
                <td id="grave-73" data-name="73">73</td>
                <td id="grave-74" data-name="74">74</td>
            </tr>

            <tr>

                <td id="grave-75" data-name="75">75</td>
                <td id="grave-76" data-name="76">76</td>
                <td id="grave-77" data-name="77">77</td>
                <td id="grave-78" data-name="78">78</td>
                <td id="grave-79" data-name="79">79</td>
                <td id="grave-80" data-name="80">80</td>
                <td id="grave-81" data-name="81">81</td>
                <td class="space">🟦</td>
                <td id="grave-82" data-name="82">82</td>
                <td id="grave-83" data-name="83">83</td>

            </tr>

            <tr>
                <td id="door" class="doorColor non-clickable" data-name="101">
                        <span class="icon-label">
                         <i class="fa-solid fa-door-open"></i><span class="badge badge-danger">G6</span>
                     </span>
                 </td>
                 <td class="space">🟦</td>
                 <td class="space">🟦</td>
                 <td class="space">🟦</td>
                 <td class="space">📍</td>
                 <td class="space">PA4</td>
                 <td class="space">🟦</td>
                 <td class="space">🟦</td>
                 <td class="space">🟦</td>
                 <td id="door" class="doorColor non-clickable" data-name="101">
                    <i class="fa-solid fa-door-open"></i><span class="badge badge-danger">G2</span>
                </td>   
            </tr>

            <tr>
                <td id="grave-84" data-name="84">84</td>
                <td id="grave-85" data-name="85">85</td>
                <td id="grave-86" data-name="86">86</td>
                <td id="grave-87" data-name="87">87</td>
                <td id="grave-88" data-name="88">88</td>
                <td id="grave-89" data-name="89">89</td>
                <td id="grave-90" data-name="90">90</td>

                <td class="space">🟦</td>
                <td id="grave-92" data-name="92">92</td>
                <td id="grave-92" data-name="92">93</td>
            </tr>

            <tr>
                <td id="grave-93" data-name="93">93</td>
                <td id="grave-94" data-name="94">94</td>
                <td id="grave-95" data-name="95">95</td>
                <td id="grave-96" data-name="96">96</td>
                <td id="grave-97" data-name="97">97</td>
                <td id="grave-98" data-name="98">98</td>
                <td id="grave-99" data-name="99">99</td>
                <td id="office" class="office non-clickable" data-name="101">
                    <i class="fa-solid fa-building fa-sm"></i><span class="badge badge-danger">M</span>
                </td>
                <td id="grave-100" data-name="100">100</td>
                <td id="grave-101" data-name="101">101</td>
            </tr>
        </table>
            
        </div>
    </div>
    <div class="col-xl-4">
        <!-- Account details card-->
        <div class="card mb-1 mx-12 my-12">
            <div class="card-header"><i class="fa-solid fa-file-pen"></i> Fill Up the Form</div>
            <div class="card-body">
            <?php
if ($lvl == 0) {
    // Display the form
    ?>
   <form action="save_schedule.php" method="post" autocomplete="off" enctype="multipart/form-data">
    <input class="form-control" id="inputOrgName" type="hidden" name="size" value="na" placeholder="Length, Width and Height">
    <input class="form-control" type="hidden" name="service" id="title" placeholder="Service" value="na">
    
    <!-- Form Group (Grave Number)-->
     <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1" for="inputUsername">Grave Number</label>
            <input type="text" id="input-field" placeholder="Click a number to enter" readonly name="graveNum" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="small mb-1">Schedule</label>
            <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
        </div>
    </div>

    <!-- Form Row for File Uploads -->
    <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1" for="inputValidID">Valid ID (Upload any valid ID)</label>
            <label for="inputValidID" class="upload-btn">Upload File
                <input class="form-control" id="inputValidID" type="file" name="id" required style="display: none;" onchange="displayFileName('fileName1', this)">
            </label>
            <span id="fileName1"></span>
        </div>

        <div class="col-md-6">
            <label class="small mb-1" for="inputBurialPermit">Burial Permit (Las Piñas Issued)</label>
            <label for="inputBurialPermit" class="upload-btn">Upload File
                <input class="form-control" id="inputBurialPermit" type="file" name="bpermit" required style="display: none;" onchange="displayFileName('fileName2', this)">
            </label>
            <span id="fileName2"></span>
        </div>
    </div>

    <!-- Form Row for Additional File Uploads -->
    <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1" for="inputReBurial">Re Burial Permit (Las Piñas Issued)</label>
            <label for="inputReBurial" class="upload-btn">Upload File
                <input class="form-control" id="inputReBurial" type="file" name="rbpermit" required style="display: none;" onchange="displayFileName('fileName3', this)">
            </label>
            <span id="fileName3"></span>
        </div>

        <div class="col-md-6">
            <label class="small mb-1" for="inputLocation">Death Certificate (Registered)</label>
            <label for="inputLocation" class="upload-btn">Upload File
                <input class="form-control" id="inputLocation" type="file" name="doc" required style="display: none;" onchange="displayFileName('fileName4', this)">
            </label>
            <span id="fileName4"></span>
        </div>
    </div>


    <!-- Form Row for Lot Selection -->
    <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1" for="option">Private Lots & Price</label>
            <select class="form-select small mb-1" aria-label="Default select example" id="option" name="lots">
                <option selected>Choose</option>
                <option value="1">Under Ground - P12, 500.00</option>
                <option value="2">Re-Opening - P6, 000.00</option>
                <option value="3">Above Ground - P11, 500.00</option>
                <option value="4">Re-Opening - P4,000.00</option>
                <option value="5">Bone Box - P4.000.00</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="small mb-1">Full Name of Deceased</label>
            <input class="form-control" type="text" name="description" id="description" placeholder="Full Name of Deceased" required> 
        </div>
    </div>

    <!-- Form Row for Schedule and Date -->
    <div class="row gx-3 mb-3">
       
        <div class="col-md-6">
            <label class="small mb-1">Date of Birth</label>
            <input type="date" class="form-control form-control-sm rounded-0" name="bday" id="bday" required>
        </div>

        <div class="col-md-6">
            <label class="small mb-1">Deceased Date</label>
            <input type="date" class="form-control form-control-sm rounded-0" name="DoCDte" id="DoCDte" required>
        </div>
    </div>

        <!-- Gender Radio Buttons (Horizontal Layout) -->
    <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1">Gender</label>
            <div class="gender-buttons">
                <input type="radio" id="male" name="gender" value="Male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="Female">
                <label for="female">Female</label>
            </div>
        </div>

    </div>

    <hr class="sidebar-divider my-2">
    <button type="submit" class="form-control btn btn-success" name="submit">Submit</button>
</form>

<?php
} else {
    // Display the color legend
    ?>
    <h5>Color Legend:</h5>
    <ul class="list-unstyled">
        <div class="mb-3">
            <li><span style="display: inline-block; width: 20px; height: 20px; background-color: red; margin-right: 8px;"></span>Occupied</li>
        </div>
        <div class="mb-3">
            <li><span style="display: inline-block; width: 20px; height: 20px; background-color: #FEFE62; margin-right: 8px;"></span>Entrance/Exit</li>
        </div>
        <div class="mb-3">
            <li><span style="display: inline-block; width: 20px; height: 20px; background-color: #FF6364; margin-right: 8px;"></span>Helpdesk</li>
        </div>
        <div class="mb-3">
            <li><span style="display: inline-block; width: 20px; height: 20px; background-color: #4ECCFE; margin-right: 8px;"></span>Main Office</li>
        </div>
    </ul>
    <?php
}
?>


            </div>
        </div>
        
    </div>

    <!--End Profile Form-->
</div>
</div>

<script>
    // Simple JavaScript to display the file name
    function displayFileName(spanId, input) {
        var fileName = input.files[0] ? input.files[0].name : '';
        document.getElementById(spanId).textContent = fileName;
    }
</script>

<script type="text/javascript">
    // Select all the grave cells in the table
    const graves = document.querySelectorAll('#gravesDiagram td:not(.space)');

    // Add a click event listener to each grave
    graves.forEach(grave => {
        grave.addEventListener('click', () => {
            // Remove the "selected" class from all graves
            graves.forEach(s => s.classList.remove('selected'));

            // Add the "selected" class to the clicked grave
            grave.classList.add('selected');
        });
    });
</script>

<script>
    // JavaScript to handle td click and update the input field
    function setInputValue(event) {
        // Get the text content of the clicked td
        var value = event.target.textContent;

        // Set the value of the input field
        document.getElementById('input-field').value = value;
    }

    // Add event listeners to the td elements
    window.onload = function() {
        var tdElements = document.querySelectorAll('td[id^="grave-"]');
        tdElements.forEach(function(td) {
            td.addEventListener('click', setInputValue);
        });
    };
</script>
<script>
    // Function to set the value of the input field when a td is clicked
    function setInputValue(event) {
        var value = event.target.textContent;
        document.getElementById('input-field').value = value;
        highlightCell(value);
    }

    // Function to highlight the cell when searched value is found
    function highlightCell(value) {
        // Reset any previous highlights
        var allTds = document.querySelectorAll('td');
        allTds.forEach(function(td) {
            td.classList.remove('highlighted');
        });

        // Find and highlight the td with the matching value
        var matchingTd = document.querySelector('td[data-name="'+ value +'"]');
        if (matchingTd) {
            matchingTd.classList.add('highlighted');
        }
    }

    // Function to handle the search input and highlight the corresponding td
    function searchValue() {
        var searchValue = document.getElementById('search-input').value;
        highlightCell(searchValue);
    }


    window.onload = function() {
        var tdElements = document.querySelectorAll('td[id^="grave-"]');
        tdElements.forEach(function(td) {
            td.addEventListener('click', setInputValue);
        });

        
        document.getElementById('search-input').addEventListener('input', searchValue);
    };
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const occupiedGraves = <?php echo json_encode($occupied_graves); ?>;

        // Highlight occupied graves
        occupiedGraves.forEach(grave => {
            const graveCell = document.querySelector(`td[data-name="${grave}"]`);
            if (graveCell) {
                graveCell.classList.add('occupied');
            }
        });

        // Handle clicks on available graves
        const graves = document.querySelectorAll('#gravesDiagram td:not(.occupied)');
        graves.forEach(grave => {
            grave.addEventListener('click', () => {
                graves.forEach(s => s.classList.remove('selected'));
                grave.classList.add('selected');
                console.log(`Selected Grave: ${grave.textContent}`);
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const occupiedGraves = <?php echo json_encode($occupied_graves); ?>;
        const graveDescriptions = <?php echo json_encode($grave_descriptions); ?>; // Pass descriptions to JS

        // Highlight occupied graves and set title attribute
        occupiedGraves.forEach(grave => {
            const graveCell = document.querySelector(`td[data-name="${grave}"]`);
            if (graveCell) {
                graveCell.classList.add('occupied');
                // Set the description as the title attribute
                graveCell.title = graveDescriptions[grave] || "No description available";
            }
        });
    });
</script>

<!--Sweetalert link and script-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.4/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.4/dist/sweetalert2.all.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!---->

<!--Notification-->
<?php 
if (isset($_SESSION['msg']) && $_SESSION['msg'] !='' && $_SESSION['icon'])
{
    ?>
    <script>
        swal({
            title: '<?php echo $_SESSION['msg']; ?>',
            text: '<?php echo $_SESSION['msg_txt'];?>',
            icon: '<?php echo $_SESSION['icon'];?>',
            confirmButtonText: 'Okay',
              customClass: {
            title: 'swal-title',  
            content: 'swal-content' 
        },
        html: true
        });
    </script>
    <?php 
      unset($_SESSION['msg']);
      unset($_SESSION['msg_txt']);
      unset($_SESSION['icon']);
}
?>

