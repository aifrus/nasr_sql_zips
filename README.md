# nasr_sql_zips

FAA Data in MySQL Format

Under Development

## Synopsis

In July 2023, the US FAA began publishing National Airspace System Resource (NASR) data in CSV Format with well-defined data types.
- https://www.faa.gov/air_traffic/flight_info/aeronav/aero_data/NASR_Subscription/

In January 2024, we created the "FAA CSV to SQL" Project - "FC2S" which will also be available soon via PHP Composer, but you can see the early source code at https://github.com/aifrus/fc2s which imports this data when released and exports the .sql file, zips it, and pushes it to this repository.

Below is a comprehensive bullet list of the tables in the FAA NASR monthly data database, along with a brief description of the data contained within each and the relationships between the tables:

# Developer Documentation for Aeronautical Database

## Overview

This database contains aeronautical information related to various aspects of air navigation and air traffic control. It includes data on boundaries, airports, communication facilities, airways, weather reporting locations, and more. The data is essential for flight planning, navigation, and ensuring safety in the airspace.

## Database Structure

The database is organized into multiple tables, each representing a different type of aeronautical data. Below is a brief description of each table:

### Aeronautical Boundary Segments (ARB)
Contains information about segments that define the boundaries of air route traffic control centers (ARTCCs) and flight information regions (FIRs).
- **ARB_BASE**: Contains information about ARTCC (Air Route Traffic Control Centers) boundaries, including location ID, location name, and coordinates.
- **ARB_SEG**: Details the segments of ARTCC boundaries, including sequence numbers and coordinates.

### Airports and Other Landing Facilities (APT)
Details about airports, heliports, and other landing facilities, including location, type, and services offered.
- **APT_ARS**: Arresting systems at airports, including runway IDs and device codes.
- **APT_ATT**: Airport attendance schedules.
- **APT_BASE**: Basic airport data, including location, type, ownership, and facilities.
- **APT_CON**: Contact information for airport owners and managers.
- **APT_RMK**: Remarks related to airports, including general comments and specific notes.
- **APT_RWY**: Runway data for airports, including dimensions, surface type, and condition.
- **APT_RWY_END**: Details about runway ends, including alignment and lighting.

### Air Traffic Control Communication (ATC)
Information on air traffic control facilities, including tower hours, sectors, and frequencies.
- **ATC_ATIS**: Information about Automatic Terminal Information Service (ATIS) frequencies and hours of operation.
- **ATC_BASE**: Basic data about ATC facilities, including type, location, and operational hours.
- **ATC_RMK**: Remarks related to ATC facilities.
- **ATC_SVC**: Services provided by ATC facilities.

### Airway (AWY)
Data on airways, including their identification, location, and the navigational aids that define them.
- **AWY_ALT**: Minimum en route altitudes for airways, including associated navigation points.
- **AWY_BASE**: Basic information about airways, including designation and route string.
- **AWY_SEG**: Segments of airways, including magnetic courses and distances between points.

### Class Airspace (CLS_ARSP)
Details about different classes of airspace and their operational hours.
- **CLS_ARSP**: Details about different classes of airspace, including hours of operation and remarks.

### Coded Departure Routes (CDR)
Coded routes for departures, including origin, destination, and routing information.
- **CDR**: Coded departure routes, including origin, destination, and route string.

### Communication Facilities (COM)
Information on communication outlets, such as Remote Communications Outlets (RCOs) and Ground Communication Outlets (GCOs).
- **COM**: Information about communication facilities, including frequencies and hours of operation.

### Departure Procedure (DP)
Standardized departure routes from airports, including RNAV and non-RNAV procedures.
- **DP_APT**: Airports associated with departure procedures.
- **DP_BASE**: Basic information about departure procedures, including RNAV capability and served airports.


### Fix/Reporting Point/Waypoint (FIX)
Fixed geographical points used for navigation and reporting aircraft position.
- **FIX_BASE**: Basic data about fixes, including location and type.
- **FIX_CHRT**: Charting information for fixes.
- **FIX_NAV**: Navigation data associated with fixes, including bearings and distances to navaids.

### Flight Service Stations (FSS)
Details on Flight Service Stations, which provide information and services to the aviation community.
- **FSS_RMK**: Remarks related to Flight Service Stations.

### Frequency Data (FRQ)
Frequency information for communication with ATC and navigation facilities.
- **FRQ**: Frequency information for various facilities, including ATC and FSS.

### Holding Patterns (HPF)
Information on standard holding pattern procedures at specific fixes or navigational aids.
- **HPF_BASE**: Basic data about holding patterns, including associated navigation aids.
- **HPF_CHRT**: Charting information for holding patterns.
- **HPF_RMK**: Remarks related to holding patterns.
- **HPF_SPD_ALT**: Speed and altitude restrictions for holding patterns.

### Instrument Landing Systems (ILS)
Details on ILS components, including localizers, glide slopes, and marker beacons.
- **ILS_BASE**: Basic information about ILS systems, including location and type.
- **ILS_DME**: Distance Measuring Equipment associated with ILS.
- **ILS_GS**: Glide Slope components of ILS systems.
- **ILS_MKR**: Marker beacons for ILS approaches.
- **ILS_RMK**: Remarks related to ILS systems.

### Location Identifiers (LID)
Unique identifiers for locations such as airports, navigation aids, and weather reporting stations.
- **LID**: Identifiers for various locations, including airports and navigation aids.

### Military Operations (MIL_OPS)
Information on military operations areas, including contact information and operating hours.
- **MIL_OPS**: Information about military operations, including type and hours of operation.

### Miscellaneous Activity Area (MAA)
Areas designated for activities such as parachute jumping, gliding, or aerobatics.
- **MAA_BASE**: Basic information about miscellaneous activity areas, including location and use.
- **MAA_CON**: Contact information for managing facilities of MAAs.
- **MAA_RMK**: Remarks related to MAAs.
- **MAA_SHP**: Shape data for MAAs, including coordinates.

### Navigation Aids (NAV)
Information on navigational aids like VORs, NDBs, and TACANs, including location and operational status.
- **NAV_BASE**: Basic data about navigation aids, including type and location.
- **NAV_CKPT**: Checkpoint information for navigation aids.
- **NAV_RMK**: Remarks related to navigation aids.

### Parachute Jump Area (PJA)
Designated areas for parachute jumping activities, including location and usage details.
- **PJA_BASE**: Basic information about parachute jump areas, including location and maximum altitude.
- **PJA_CON**: Contact information for managing facilities of PJAs.

### Preferred Route / Tower Enroute Control (TEC) Routes (PFR)
Preferred routes for flights, including tower en route control routes that provide a structured flow of traffic.
- **PFR_BASE**: Basic information about preferred routes and TEC routes, including origin and destination.
- **PFR_SEG**: Segments of preferred routes and TEC routes.

### RADAR Data (RDR)
Information on radar facilities, including type and operating hours.
- **RDR**: Information about radar facilities, including type and hours of operation.

### Standard Terminal Arrival (STAR)
Standardized arrival routes to airports, including RNAV and non-RNAV procedures.

- **STAR_APT**: Airports associated with standard terminal arrivals.
- **STAR_BASE**: Basic information about STARs, including RNAV capability and served airports.
- **STAR_RTE**: Route information for STARs, including transitions and waypoints.


### Weather Reporting Locations (WXL)
Locations where weather data is collected and reported, including ASOS and AWOS stations.

- **WXL_BASE**: Basic information about weather reporting locations, including coordinates and elevation.
- **WXL_SVC**: Services provided by weather reporting locations.

## Data Access and Usage

To access and use the data in this database, developers should:

1. Understand the structure of each table and the relationships between them.
2. Use appropriate SQL queries to retrieve data based on specific criteria.
3. Ensure that data is used in accordance with aviation regulations and standards.
4. Regularly update the data to maintain accuracy and relevance for flight operations.

## Data Integrity and Updates

The data in this database is subject to change due to updates in airspace structure, facility status, and other operational considerations. It is crucial to regularly update the database to ensure that the information is current and accurate.

The FAA Publishes these updates on a 28-day cycle, with a preview database becoming available 14 days before each point.  The preview data is subject to change until it becomes current.

As long as our system is online you can retrieve the current databases at:
- https://github.com/aifrus/nasr_sql_zips/tree/main/archive
If for some reason our service goes offline or if you just wish to import the data from FAA CSV to SQL yourself, you can check out our project at
- https://github.com/aifrus/fc2s

### Relationships Between Tables
- Many tables are related by common fields such as `SITE_NO`, `ARPT_ID`, `NAV_ID`, `STATE_CODE`, `COUNTRY_CODE`, and `ICAO_REGION_CODE`.
- Tables like `APT_BASE`, `DP_APT`, `STAR_APT`, and `ILS_BASE` are related through airport identifiers (`ARPT_ID`).
- Navigation-related tables (`NAV_BASE`, `FIX_NAV`, `AWY_SEG`, `HPF_BASE`, etc.) are often related through navigation aid identifiers (`NAV_ID`).
- Tables containing remarks (`APT_RMK`, `ATC_RMK`, `NAV_RMK`, etc.) provide additional context and details related to the primary tables they are associated with.
- The `MAA_BASE`, `MAA_CON`, `MAA_RMK`, and `MAA_SHP` tables are related by the `MAA_ID` field, providing a comprehensive view of miscellaneous activity areas.
- The `PFR_BASE` and `PFR_SEG` tables are related by the `ORIGIN_ID` and `DSTN_ID` fields, detailing preferred routes between specific locations.

This structure allows for a complex but organized system that can be queried for detailed information about various aspects of the National Airspace System, including airports, navigation aids, air traffic control, military operations, and weather reporting.


## Conclusion

This database is a comprehensive resource for aeronautical information. Developers should use this documentation as a guide to understanding the database structure and accessing the data for various applications in the aviation industry.
