<?php

$host = 'localhost'; // Database host
$user = 'root';      // Database user
$pass = '';          // Database password
$dbname = 'NASR_2025-03-20'; // Database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Table descriptions
$tableDescriptions = [
    'APT_ARS' => 'Contains information on arresting systems at airports, including runway IDs and device codes.',
    'APT_ATT' => 'Details airport attendance schedules.',
    'APT_BASE' => 'Provides basic information about airports, including location, type, and ownership.',
    'APT_CON' => 'Contains contact information for airport owners and managers.',
    'APT_RMK' => 'Includes remarks related to airports, offering general comments and specific notes.',
    'APT_RWY' => 'Contains runway data for airports, detailing dimensions, surface type, and condition.',
    'APT_RWY_END' => 'Provides details about each runway end, including alignment and lighting information.',
    'ARB_BASE' => 'Contains information about the boundaries of air route traffic control centers (ARTCCs).',
    'ARB_SEG' => 'Details the segments that define ARTCC boundaries, including sequence numbers and coordinates.',
    'ATC_ATIS' => 'Information about Automatic Terminal Information Service (ATIS) frequencies and hours of operation.',
    'ATC_BASE' => 'Basic data regarding air traffic control facilities, including type, location, and operational hours.',
    'ATC_RMK' => 'Remarks related to ATC facilities providing additional context.',
    'ATC_SVC' => 'Outlines services provided by air traffic control facilities.',
    'AWY_BASE' => 'Basic information about airways, including designation and route string.',
    'AWY_SEG_ALT' => 'Contains minimum en route altitudes for airways.',
    'CDR' => 'Coded departure routes, detailing origin, destination, and route string.',
    'CLS_ARSP' => 'Details about different classes of airspace and their operational hours.',
    'COM' => 'Information about communication outlets, such as Remote Communications Outlets (RCOs).',
    'DP_APT' => 'Lists airports associated with standardized departure procedures.',
    'DP_BASE' => 'Basic information on departure procedures, including RNAV capabilities.',
    'DP_RTE' => 'Contains standardized routes for departures from airports.',
    'FIX_BASE' => 'Basic data about fixes used for navigation and reporting aircraft position.',
    'FIX_CHRT' => 'Charting information associated with fixes.',
    'FIX_NAV' => 'Navigation data linked to fixes, detailing bearings and distances.',
    'FRQ' => 'Frequency information for communication with air traffic control and navigation facilities.',
    'FSS_RMK' => 'Remarks related to Flight Service Stations providing additional context.',
    'HPF_BASE' => 'Basic data on holding patterns associated with navigation aids.',
    'HPF_CHRT' => 'Charting information for holding patterns.',
    'HPF_RMK' => 'Remarks related to holding patterns.',
    'HPF_SPD_ALT' => 'Contains speed and altitude restrictions for holding patterns.',
    'ILS_BASE' => 'Basic information about Instrument Landing Systems (ILS).',
    'ILS_DME' => 'Distance Measuring Equipment associated with ILS systems.',
    'ILS_GS' => 'Glide slope components of ILS systems.',
    'ILS_MKR' => 'Marker beacons associated with ILS approaches.',
    'ILS_RMK' => 'Remarks related to ILS systems providing additional context.',
    'LID' => 'Unique identifiers for locations such as airports and navigation aids.',
    'MAA_BASE' => 'Basic information about miscellaneous activity areas.',
    'MAA_CON' => 'Contact information for managing facilities of miscellaneous activity areas.',
    'MAA_RMK' => 'Remarks related to miscellaneous activity areas.',
    'MAA_SHP' => 'Shape data for miscellaneous activity areas, including coordinates.',
    'MIL_OPS' => 'Information on military operations areas, including contact data.',
    'MTR_AGY' => 'Contains data related to military training routes and associated agencies.',
    'MTR_BASE' => 'Basic information about military training routes.',
    'MTR_PT' => 'Points associated with military training routes.',
    'MTR_SOP' => 'Standard operating procedures related to military training routes.',
    'MTR_TERR' => 'Terrain information associated with military training routes.',
    'MTR_WDTH' => 'Width data related to military training routes.',
    'NAV_BASE' => 'Basic data on navigation aids, including type and location.',
    'NAV_CKPT' => 'Checkpoint information for navigation aids.',
    'NAV_RMK' => 'Remarks related to navigation aids providing additional context.',
    'PFR_BASE' => 'Basic information about preferred routes.',
    'PFR_RMT_FMT' => 'Format details for preferred route remarks.',
    'PFR_SEG' => 'Segments of preferred routes.',
    'PJA_BASE' => 'Basic information about parachute jump areas.',
    'PJA_CON' => 'Contact information for managing facilities related to parachute jumping.',
    'RDR' => 'Information regarding radar facilities and their operating hours.',
    'STAR_APT' => 'Airports associated with standard terminal arrivals.',
    'STAR_BASE' => 'Basic information about standard terminal arrivals.',
    'STAR_RTE' => 'Route information for standard terminal arrivals.',
    'WXL_BASE' => 'Basic information about weather reporting locations.',
    'WXL_SVC' => 'Services provided by weather reporting locations.',
];

// Get all table names
$tables = array_keys($tableDescriptions);

$schema = '';

foreach ($tables as $table) {
    // Get table columns
    $result = $conn->query("DESCRIBE $table");
    $columns = [];
    while ($row = $result->fetch_assoc()) {
        $columns[] = $row['Field'] . ':' . $row['Type']; // Include both field name and type
    }

    // Get sample rows
    $sampleRows = [];
    $result = $conn->query("SELECT * FROM `$table` ORDER BY RAND() LIMIT 2");
    while ($row = $result->fetch_assoc()) {
        $sampleRows[] = implode('|', $row); 
    }

    $description = $tableDescriptions[$table];
    $schema .= "Table: $table ($description)\nColumns: " . implode(';', $columns) . "\nSample: " . implode("; ", $sampleRows) . "\n\n";
}

// Create output file
$outputFilePath = '/root/aifrus/nasr_sql_zips/database_schema.txt';
file_put_contents($outputFilePath, $schema);

// Close connection
$conn->close();

echo "Database schema saved to $outputFilePath\n";
?>
