# nasr_sql_zips

FAA Data in MySQL Format

Under Development

## Synopsis

In July 2023, the US FAA began publishing National Airspace System Resource (NASR) data in CSV Format with well-defined data types.

In January 2024, we created the "FAA CSV to SQL" Project - "FC2S" which is also available soon via PHP Composer, but you can see the early source code [Here](https://github.com/aifrus/fc2s) which imports this data when released and exports the .sql file, zips it, and pushes it to this repository.

Below is a comprehensive bullet list of the tables in the FAA NASR monthly data database, along with a brief description of the data contained within each and the relationships between the tables:

### Aeronautical Boundary Segments (ARB)
- **ARB_BASE**: Contains information about ARTCC (Air Route Traffic Control Centers) boundaries, including location ID, location name, and coordinates.
- **ARB_SEG**: Details the segments of ARTCC boundaries, including sequence numbers and coordinates.

### Airports and Other Landing Facilities (APT)
- **APT_ARS**: Arresting systems at airports, including runway IDs and device codes.
- **APT_ATT**: Airport attendance schedules.
- **APT_BASE**: Basic airport data, including location, type, ownership, and facilities.
- **APT_CON**: Contact information for airport owners and managers.
- **APT_RMK**: Remarks related to airports, including general comments and specific notes.
- **APT_RWY**: Runway data for airports, including dimensions, surface type, and condition.
- **APT_RWY_END**: Details about runway ends, including alignment and lighting.

### Air Traffic Control Communication (ATC)
- **ATC_ATIS**: Information about Automatic Terminal Information Service (ATIS) frequencies and hours of operation.
- **ATC_BASE**: Basic data about ATC facilities, including type, location, and operational hours.
- **ATC_RMK**: Remarks related to ATC facilities.
- **ATC_SVC**: Services provided by ATC facilities.

### Airway (AWY)
- **AWY_ALT**: Minimum enroute altitudes for airways, including associated navigation points.
- **AWY_BASE**: Basic information about airways, including designation and route string.
- **AWY_SEG**: Segments of airways, including magnetic courses and distances between points.

### ASOS/AWOS (AWOS)
- (No specific tables provided in the example, but typically contains information about Automated Surface Observing Systems and Automated Weather Observing Systems at airports.)

### Class Airspace (CLS_ARSP)
- **CLS_ARSP**: Details about different classes of airspace, including hours of operation and remarks.

### Coded Departure Routes (CDR)
- **CDR**: Coded departure routes, including origin, destination, and route string.

### Communication Facilities (COM)
- **COM**: Information about communication facilities, including frequencies and hours of operation.

### Departure Procedure (DP)
- **DP_APT**: Airports associated with departure procedures.
- **DP_BASE**: Basic information about departure procedures, including RNAV capability and served airports.

### Fix/Reporting Point/Waypoint (FIX)
- **FIX_BASE**: Basic data about fixes, including location and type.
- **FIX_CHRT**: Charting information for fixes.
- **FIX_NAV**: Navigation data associated with fixes, including bearings and distances to navaids.

### Flight Service Stations (FSS)
- **FSS_RMK**: Remarks related to Flight Service Stations.

### Frequency Data (FRQ)
- **FRQ**: Frequency information for various facilities, including ATC and FSS.

### Holding Patterns (HPF)
- **HPF_BASE**: Basic data about holding patterns, including associated navigation aids.
- **HPF_CHRT**: Charting information for holding patterns.
- **HPF_RMK**: Remarks related to holding patterns.
- **HPF_SPD_ALT**: Speed and altitude restrictions for holding patterns.

### Instrument Landing Systems (ILS)
- **ILS_BASE**: Basic information about ILS systems, including location and type.
- **ILS_DME**: Distance Measuring Equipment associated with ILS.
- **ILS_GS**: Glide Slope components of ILS systems.
- **ILS_MKR**: Marker beacons for ILS approaches.
- **ILS_RMK**: Remarks related to ILS systems.

### Location Identifiers (LID)
- **LID**: Identifiers for various locations, including airports and navigation aids.

### Military Operations (MIL_OPS)
- **MIL_OPS**: Information about military operations, including type and hours of operation.

### Military Training Routes (MTR)
- (No specific tables provided in the example, but typically contains information about designated routes for military training.)

### Miscellaneous Activity Area (MAA)
- **MAA_BASE**: Basic information about miscellaneous activity areas, including location and use.
- **MAA_CON**: Contact information for managing facilities of MAAs.
- **MAA_RMK**: Remarks related to MAAs.
- **MAA_SHP**: Shape data for MAAs, including coordinates.

### Navigation Aids (NAV)
- **NAV_BASE**: Basic data about navigation aids, including type and location.
- **NAV_CKPT**: Checkpoint information for navigation aids.
- **NAV_RMK**: Remarks related to navigation aids.

### Parachute Jump Area (PJA)
- **PJA_BASE**: Basic information about parachute jump areas, including location and maximum altitude.
- **PJA_CON**: Contact information for managing facilities of PJAs.

### Preferred Route / Tower Enroute Control (TEC) Routes (PFR)
- **PFR_BASE**: Basic information about preferred routes and TEC routes, including origin and destination.
- **PFR_SEG**: Segments of preferred routes and TEC routes.

### RADAR Data (RDR)
- **RDR**: Information about radar facilities, including type and hours of operation.

### Standard Terminal Arrival (STAR)
- **STAR_APT**: Airports associated with standard terminal arrivals.
- **STAR_BASE**: Basic information about STARs, including RNAV capability and served airports.
- **STAR_RTE**: Route information for STARs, including transitions and waypoints.

### Weather Reporting Locations (WXL)
- **WXL_BASE**: Basic information about weather reporting locations, including coordinates and elevation.
- **WXL_SVC**: Services provided by weather reporting locations.

### Relationships Between Tables
- Many tables are related by common fields such as `SITE_NO`, `ARPT_ID`, `NAV_ID`, `STATE_CODE`, `COUNTRY_CODE`, and `ICAO_REGION_CODE`.
- Tables like `APT_BASE`, `DP_APT`, `STAR_APT`, and `ILS_BASE` are related through airport identifiers (`ARPT_ID`).
- Navigation-related tables (`NAV_BASE`, `FIX_NAV`, `AWY_SEG`, `HPF_BASE`, etc.) are often related through navigation aid identifiers (`NAV_ID`).
- Tables containing remarks (`APT_RMK`, `ATC_RMK`, `NAV_RMK`, etc.) provide additional context and details related to the primary tables they are associated with.
- The `MAA_BASE`, `MAA_CON`, `MAA_RMK`, and `MAA_SHP` tables are related by the `MAA_ID` field, providing a comprehensive view of miscellaneous activity areas.
- The `PFR_BASE` and `PFR_SEG` tables are related by the `ORIGIN_ID` and `DSTN_ID` fields, detailing preferred routes between specific locations.

This structure allows for a complex but organized system that can be queried for detailed information about various aspects of the National Airspace System, including airports, navigation aids, air traffic control, military operations, and weather reporting.
