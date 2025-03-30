
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/map_style.css">
<?php
require_once('includes/dbcon.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$occupied_graves = [];
$sql = "SELECT graveNum, description FROM schedule_list WHERE status='1'"; // Get description too
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $occupied_graves[$row['graveNum']] = $row['description'];
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


 .space {
        background-color: white !important;
    }
</style>



<div class="container-fluid">
    <div class="row">
        <div class="col-xl-8">
            <!-- Table with Grave Numbers -->
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

    <div class="col-xl-4">
        <!-- Account details card-->
        <div class="card mb-1 mx-12">
            <div class="card-header"><i class="fa-solid fa-route"></i> DIRECTION GUIDE</div>
            <div class="card-body">
                <!-- Color Legend -->
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
                
            </div>
        </div>
    </div>
</div>
</div>
<!--End Profile Form-->
</div>
</div>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        const graves = document.querySelectorAll('#gravesDiagram td:not(.space)');
        
    // Get the occupied graves from PHP
        const occupiedGraves = <?php echo json_encode($occupied_graves); ?>;

    // Add event listeners for hover and display descriptions
        graves.forEach(grave => {
            const graveNum = grave.getAttribute('data-name');
            
        // Check if the grave has a description
            if (occupiedGraves[graveNum]) {
                const description = occupiedGraves[graveNum];
                
            // Set the title attribute for the tooltip
            grave.setAttribute('title', description); // Set title for the hover effect
            
            // Optionally, you can also highlight graves in red if they are occupied
            grave.classList.add('occupied'); 
        }
        
        // Additional functionality (e.g., selecting graves on click)
        grave.addEventListener('click', () => {
            graves.forEach(s => s.classList.remove('selected')); // Remove selected class
            grave.classList.add('selected'); // Add selected class to clicked grave
        });
    });
    });

</script>
<script>
   // Create a JavaScript object with the graveNum as the key and description as the value
    var occupiedGraves = <?php echo json_encode($occupied_graves); ?>;

// Function to handle the search and highlight the corresponding td
    function searchGrave() {
    var searchTerm = document.getElementById('grave-search').value.toLowerCase(); // Get the search input (converted to lowercase)
    var descriptionOutput = document.getElementById('description-output'); // Element to show the description
    var tds = document.querySelectorAll('td[data-name]'); // Get all td elements with the data-name attribute

    // Remove the highlight class from all td elements
    tds.forEach(function(td) {
        td.classList.remove('highlight');
    });

    if (searchTerm === "") {
        // If the search term is empty, do not highlight anything and clear the description
        descriptionOutput.innerHTML = "";
        return;
    }

    var found = false;

    // Loop through the occupiedGraves object to find a description match
    for (var graveNum in occupiedGraves) {
        if (occupiedGraves.hasOwnProperty(graveNum)) {
            var description = occupiedGraves[graveNum].toLowerCase();

            // If the description matches the search term
            if (description.includes(searchTerm)) {
                // Display the description
                descriptionOutput.innerHTML = "Search Result: " + occupiedGraves[graveNum];

                // Highlight the corresponding td based on the grave number
                var matchingTd = document.querySelector('td[data-name="' + graveNum + '"]');
                if (matchingTd) {
                    matchingTd.classList.add('highlight'); // Add highlight class to the matching td
                    
                    // Scroll the matching td into view
                    matchingTd.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }

                found = true;
                break; // Exit loop after first match
            }
        }
    }

    if (!found) {
        // If no description is found, display a "not found" message
        descriptionOutput.innerHTML = "Nothing found for the search: " + searchTerm;
    }
}

// Add event listeners for both the button and the input field
document.getElementById('search-btn').addEventListener('click', searchGrave);



</script>

<script type="text/javascript">
    // Select all the grave cells in the table
    const graves = document.querySelectorAll('#gravesDiagram td:not(.space)');

    // Occupied graves from PHP
    const occupiedGraves = <?php echo json_encode($occupied_graves); ?>;

    // Map occupied graves to an object for easy access
    const occupiedGravesMap = occupiedGraves.reduce((map, grave) => {
        map[grave.graveNum] = grave.description;
        return map;
    }, {});

    // Add hover effect to show description when hovering over occupied graves
    graves.forEach(grave => {
        grave.addEventListener('mouseenter', () => {
            const graveNum = grave.getAttribute('data-name');
            if (occupiedGravesMap[graveNum]) {
                const description = occupiedGravesMap[graveNum];
                grave.title = description; // Show description on hover
            }
        });

        grave.addEventListener('click', () => {
            // Remove the "selected" class from all graves
            graves.forEach(s => s.classList.remove('selected'));

            // Add the "selected" class to the clicked grave
            grave.classList.add('selected');
        });

        // Highlight graves in red if their graveNum matches the data-name attribute
        const graveNum = grave.getAttribute('data-name');
        if (occupiedGravesMap[graveNum]) {
            grave.classList.add('occupied'); // Add a class to highlight the grave
        }
    });

    // JavaScript to handle td click and update the input field
    function setInputValue(event) {
        // Get the text content of the clicked td
        var value = event.target.textContent;

        // Set the value of the input field
        document.getElementById('input-field').value = value;
    }

    window.onload = function() {
        var tdElements = document.querySelectorAll('td[id^="grave-"]');
        tdElements.forEach(function(td) {
            td.addEventListener('click', setInputValue);
        });
    };
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

