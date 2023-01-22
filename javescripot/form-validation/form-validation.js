// function to display the error
let printError = (elemId, msg) => {
	document.getElementById(elemId).innerHTML = msg;
}

// Function to validate form data
let validateForm = () => {
	event.preventDefault();

	let full_name = contactForm.full_name.value;
	let email = contactForm.email.value;
	let mobile = contactForm.mobile.value;
	let country = contactForm.country.value;
	let gender = contactForm.gender.value;
	let hobbies = [];

	let hhobbies = document.getElementsByName("hobbies[]");

	for (let hobby of hhobbies) {
		if(hobby.checked) {
			hobbies.push(hobby.value);
		}
	}

	let nameErr = emailErr = mobileErr = countryErr = genderErr = true;

	// validate full name
	if(full_name == "") {
		printError("nameErr", "Please enter a name");
	} else {
		let regex = /^[a-zA-Z\s]+$/;

		if(regex.test(full_name) === false) {
			printError("nameErr", "Please enter a valid name");
		} else {
			printError("nameErr", "");
			nameErr = false;
		}
	}

	// validate email
	if(email == "") {
		printError("emailErr", "Please enter an email");
	} else {
		let regex = /^\S+@\S+\.\S+$/;

		if(regex.test(email) === false) {
			printError("emailErr", "Please enter a valid email");
		} else {
			printError("emailErr", "");
			emailErr = false;
		}
	}

	// validate mobile
	if(mobile == "") {
		printError("mobileErr", "Please enter a mobile number");
	} else {
		let regex = /^\d{10}$/;

		if(regex.test(mobile) === false) {
			printError("mobileErr", "Please enter a valid mobile number");
		} else {
			printError("mobileErr", "");
			mobileErr = false;
		}
	}

	// validate country
	if(country == "") {
		printError("countryErr", "Please select a country");
	} else {
		printError("countryErr", "");
		countryErr = false;
	}

	// validate gender
	if(gender == "") {
		printError("genderErr", "Please select a gender");
	} else {
		printError("genderErr", "");
		genderErr = false;
	}

	if((nameErr || emailErr || mobileErr || countryErr || genderErr) === true) {
		return false;
	} else {
		var formData = `
			You've entered the following details: <br>
			<strong> Full Name: </strong> ${full_name} <br>
			<strong> Email: </strong> ${email} <br>
			<strong> Mobile: </strong> ${mobile} <br>
			<strong> Country: </strong> ${country} <br>
			<strong> Gender: </strong> ${gender} <br>
		`;

		if(hobbies.length) {
			formData += `<strong> Hobbies: </strong> ${hobbies.join(", ")}`;
		}

		document.getElementById('displayData').innerHTML = formData;
	}
}
