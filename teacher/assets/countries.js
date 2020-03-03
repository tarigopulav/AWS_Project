
var country_arr = new Array("School of Engineering and Technology", "School of Business", "School of Computer Applications","School of Pharmacy","School of Architecture & Design","School of Sciences","School of Nursing Sciences","School of Agriculture","School of Art and Design","School of Physical Education & Sports","School of Education","School of Fine Arts","School of Law","School of Humanities");

// States
var s_a = new Array();
s_a[0]="";
s_a[1]="B.Tech.|B.Tech.(Hons.)|B.Tech.+MBA(Int)|B.Tech.(Hons.)+MBA(Int)|M.Tech.|B.Tech.+M.Tech.(Int)|B.Tech.(Hons.)+M.Tech.(Int)|Information Technology|Ghowr|Ph.D";
s_a[2]="MBA(Financial-Markets)|MBA(HRM & Industrial Law)|MBA(HRM)|MBA(Dual Specialization)|MBA(Supply Chain & Logistics)|BBA|Financial Market|BBA(Hons.)|B.Com.|B.Com.(Hons.)|B.Com.(Hons.)pursuing CA,CS & CMA)|Ph.D in (Management)";
s_a[3]="MCA|BCA|BCA(Hons.)|Ph.D (CA)";
s_a[4]="B. Pharmacy";
s_a[5]="B. Arch";
s_a[6]="B.Sc. BioTech|B.Sc. Food Tech|B.Sc. (PCM / CS)|B.Sc. Statistics|B.Sc. Optometry|M.Sc. Food Techn|M.Sc. Microbiology|M.Sc. Petroleum Tech|M.Sc. BioTech|M.Sc. Environment Science & Tech|M.Sc. Chemistry|M.Sc. Applied Mathematics|M.Sc. (Physics)|Ph.D";
s_a[7]="M.Sc|B.Sc.|B.Sc. Post Basic";
s_a[8]="B.Sc(Ag)|M.Sc(Ag/Horticulture)|MBA in Agri Business|Ph.D";
s_a[9]="B.Sc.(Interior Design)|B.Sc.(Fashion Design)|Diploma(Fashion/Interior)";
s_a[10]="B.Sc(Health & Physical Education)";
s_a[11]="B.Ed";
s_a[12]="BFA (Painting  & Sculpture)|B.A. (Acting)|B.A. (Music)|MFA (Painting  & Sculpture)";
s_a[13]="B.A. / B.Com. + LLB (Integrated)*|LLM";
s_a[14]="B.A. (India & South  Asia Studies)|M.A. (India & South  Asia Studies)|Diploma (India & South Asia Studies)|B.A. + M.A. (Integrated)|B.A. (Journalism & mass Comm.)|PG Diploma(s) in journalism|Diploma(Journalism)|Certificate Course in journalism";




function populateStates( countryElementId, stateElementId ){
	
	var selectedCountryIndex = document.getElementById( countryElementId ).selectedIndex;

	var stateElement = document.getElementById( stateElementId );
	
	stateElement.length=0;	// Fixed by Julian Woods
	stateElement.options[0] = new Option('Select Course','');
	stateElement.selectedIndex = 0;
	
	var state_arr = s_a[selectedCountryIndex].split("|");
	
	for (var i=0; i<state_arr.length; i++) {
		stateElement.options[stateElement.length] = new Option(state_arr[i],state_arr[i]);
	}
}

function populateCountries(countryElementId, stateElementId){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var countryElement = document.getElementById(countryElementId);
	countryElement.length=0;
	countryElement.options[0] = new Option('Select School','-1');
	countryElement.selectedIndex = 0;
	for (var i=0; i<country_arr.length; i++) {
		countryElement.options[countryElement.length] = new Option(country_arr[i],country_arr[i]);
	}

	// Assigned all countries. Now assign event listener for the states.

	if( stateElementId ){
		countryElement.onchange = function(){
			populateStates( countryElementId, stateElementId );
		};
	}
}