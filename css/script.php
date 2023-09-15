<script>
    const switchers = [...document.querySelectorAll('.switcher')]
    switchers.forEach(item => {
        item.addEventListener('click', function() {
            switchers.forEach(item => item.parentElement.classList.remove('is-active'))
            this.parentElement.classList.add('is-active')
        })
    })


    const addMoreRowFun = () => {
        let newRow = document.createElement("tr");
        let experience_table_tbody = document.querySelector('#experience_table_tbody');

        newRow.innerHTML = `<td><input type="text" name="organization_name[]"></td>
                            <td><input type="text" name="designation_held[]"></td>
                            <td><input type="text" name="pay_scale[]"></td>
                            <td><input type="date" name="work_duration_from[]"></td>
                            <td><input type="date" name="work_duration_to[]"></td>
                            <td>
                                <Select name="job_nature[]">
                                    <option value="permanent">Permanent</option>
                                    <option value="contractual">Contractual</option>
                                    <option value="deputation">Deputation </option>
                                </Select>
                            </td>
                            <td>
                                <Select name="org_type[]">
                                    <option value="cGovt">Central Govt.</option>
                                    <option value="sGovt">State Govt.</option>
                                    <option value="cPsu">Central PSU</option>
                                </Select>
                            </td>
                            <td><input type="file" name="experience_letter[]"></td>
                            `;

        experience_table_tbody.appendChild(newRow)


    }
    function deleteRow() {
        let experience_table_tbody = document.querySelector('#user_application_table_id');
        let rowCoun = experience_table_tbody.rows.lenght;

        if(rowCount>1){
            table.deleteRow(rowCount-1)
        }
        
    }
    // state data fetching
    let pSelectState = document.getElementById('pSelectState')
    let cSelectState = document.getElementById('cSelectState')
    let cSelectDistrict = document.getElementById('cSelectDistrict')
    let pSelectDistrict = document.getElementById('pSelectDistrict')
    let data;
    let stateApi = "https://gist.githubusercontent.com/anubhavshrimal/4aeb195a743d0cdd1c3806c9c222ed45/raw/181a34db4fcb8b37533b7c8b9c489b6c01573158/Indian_Cities_In_States_JSON";




    const fetchCStateFun = async () => {

        data = await fetch(stateApi)
        data = await data.json()
        Object.keys(data).forEach((value, ind) => {
            const option = document.createElement('option');
            option.value = value;
            option.textContent = value;
            cSelectState.appendChild(option);
        });
    }
    const fetchPDistrict = async () => {

        data = await fetch(stateApi)
        data = await data.json()
        data = (data[pSelectState.value]);
        data.forEach((value, ind) => {
            let optionValue = document.createElement('option');
            optionValue.value = value;
            optionValue.textContent = value;
            pSelectDistrict.appendChild(optionValue);
        });

    }
    const fetchCDistrict = async () => {
        data = await fetch(stateApi)
        data = await data.json()
        data = (data[cSelectState.value]);
        data.forEach((value, ind) => {
            let optionValue = document.createElement('option');
            optionValue.value = value;
            optionValue.textContent = value;
            cSelectDistrict.appendChild(optionValue);
        });
    }


    const fetchPStateFun = async () => {

        data = await fetch(stateApi)
        data = await data.json()
        Object.keys(data).forEach((value, ind) => {
            const option = document.createElement('option');
            option.value = value;
            option.textContent = value;
            pSelectState.appendChild(option);
        });
    }

    const popupFun = (para) => {
        let alert_box = document.querySelector('.alert_box')
        if (para == 'yes') {
            alert_box.style.display = "flex"


        } else {
            alert_box.style.display = "none"
        }

    }
    //     <?php
            // header("Location:previewPage.php?id=00$row[id]");
            //     
            ?>

    const restrictPhoneNumber = () => {
        let phoneNumberInput = document.getElementById("mobileid");
        let enteredValue = phoneNumberInput.value;

        // Remove all non-digit characters from the entered value
        let cleanedValue = enteredValue.replace(/\D/g, '');

        // Limit the value to a maximum of 10 digits
        if (cleanedValue.length > 10) {
            cleanedValue = cleanedValue.slice(0, 10);
        }

        // Update the input field with the cleaned value
        phoneNumberInput.value = cleanedValue;
    }
    const lgoRestrictPhoneNumber = () => {
        let phoneNumberInput = document.getElementById("logmobileid");
        let enteredValue = phoneNumberInput.value;

        // Remove all non-digit characters from the entered value
        let cleanedValue = enteredValue.replace(/\D/g, '');

        // Limit the value to a maximum of 10 digits
        if (cleanedValue.length > 10) {
            cleanedValue = cleanedValue.slice(0, 10);
        }

        // Update the input field with the cleaned value
        phoneNumberInput.value = cleanedValue;
    }
    const sinRestrictPhoneNumber = () => {
        let phoneNumberInput = document.getElementById("sinmobileid");
        let enteredValue = phoneNumberInput.value;

        // Remove all non-digit characters from the entered value
        let cleanedValue = enteredValue.replace(/\D/g, '');

        // Limit the value to a maximum of 10 digits
        if (cleanedValue.length > 10) {
            cleanedValue = cleanedValue.slice(0, 10);
        }

        // Update the input field with the cleaned value
        phoneNumberInput.value = cleanedValue;
    }



    const restrictAadharNumber = () => {
        let aadharid = document.getElementById("aadharid");
        let enteredValue = aadharid.value;

        // Remove all non-digit characters from the entered value
        let cleanedValue = enteredValue.replace(/\D/g, '');

        // Limit the value to a maximum of 10 digits
        if (cleanedValue.length > 12) {
            cleanedValue = cleanedValue.slice(0, 12);
        }

        // Update the input field with the cleaned value
        aadharid.value = cleanedValue;
    }
    const restrictPincode = () => {
        let aadharid = document.getElementById("pincodeid");
        let enteredValue = aadharid.value;

        // Remove all non-digit characters from the entered value
        let cleanedValue = enteredValue.replace(/\D/g, '');

        // Limit the value to a maximum of 10 digits
        if (cleanedValue.length > 6) {
            cleanedValue = cleanedValue.slice(0, 6);
        }

        // Update the input field with the cleaned value
        aadharid.value = cleanedValue;
    }
    const restrictPincodeii = () => {
        let aadharid = document.getElementById("pincodeidii");
        let enteredValue = aadharid.value;

        // Remove all non-digit characters from the entered value
        let cleanedValue = enteredValue.replace(/\D/g, '');

        // Limit the value to a maximum of 10 digits
        if (cleanedValue.length > 6) {
            cleanedValue = cleanedValue.slice(0, 6);
        }

        // Update the input field with the cleaned value
        aadharid.value = cleanedValue;
    }
    const restrictAge = () => {
        let aadharid = document.getElementById("ageId");
        let enteredValue = aadharid.value;

        // Remove all non-digit characters from the entered value
        let cleanedValue = enteredValue.replace(/\D/g, '');

        // Limit the value to a maximum of 10 digits
        if (cleanedValue.length > 3) {
            cleanedValue = cleanedValue.slice(0, 3);
        }

        // Update the input field with the cleaned value
        aadharid.value = cleanedValue;
    }


    const addressCheckBox = () => {
        let p_address_id = document.getElementById('p_address_id');
        let c_address_id = document.getElementById('c_address_id');
        let first_state_option = document.getElementById('first_state_option');
        let first_dist_option = document.getElementById('first_dist_option');
        let pincodeid = document.getElementById('pincodeid');
        let pincodeidii = document.getElementById('pincodeidii');

        pincodeidii.value = pincodeid.value

        first_state_option.value = pSelectState.value;
        first_state_option.textContent = pSelectState.value;

        first_dist_option.value = pSelectDistrict.value;
        first_dist_option.textContent = pSelectDistrict.value;





        c_address_id.value = p_address_id.value;
        // cSelectState.textContent=pSelectState.value;
        // cSelectState.value=pSelectState.value;


    }
    const caltulateMarks = (i)=>{
        let f_marks= document.querySelector('#f_marks')
        let o_marks= document.querySelector('#o_marks')
        let totalPrecentage =(o_marks.value)*(100/f_marks.value);
         totalPrecentage = totalPrecentage.toFixed(2);

        i.value= `${totalPrecentage}%`;
       
        
    }
    const caltulateMarksii = (i)=>{
        let f_marksii= document.querySelector('#f_marksii')
        let o_marksii= document.querySelector('#o_marksii')
        let totalPrecentage =(o_marksii.value)*(100/f_marksii.value);
        totalPrecentage = totalPrecentage.toFixed(2);

        i.value= `${totalPrecentage}%`;
       
        
    }

    const caltulateMarksiii = (i)=>{
        let f_marksiii= document.querySelector('#f_marksiii')
        let o_marksiii= document.querySelector('#o_marksiii')
        let totalPrecentage =(o_marksiii.value)*(100/f_marksiii.value);
        totalPrecentage = totalPrecentage.toFixed(2);

        i.value= `${totalPrecentage}%`;
       
        
    }

    const caltulateMarksiv = (i)=>{
        let f_marksiv= document.querySelector('#f_marksiv')
        let o_marksiv= document.querySelector('#o_marksiv')
        let totalPrecentage =(o_marksiv.value)*(100/f_marksiv.value);
        totalPrecentage = totalPrecentage.toFixed(2);

        i.value= `${totalPrecentage}%`;
       
        
    }
</script>