new Vue({
    el: '#personal-data-applicant',
    data: {
        applicant_name: '',
        applicant_last_name: '',
        telephone_number: '',
        resultApplicantName: '',
        resultApplicantLastName: '',
        resultTelephone: ''
    },
    methods: {
        checkCredentialFormatter1: function () {

            var nameRegexFormatter3 = /^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{3,}$/;

            var validfirstUsername12 = this.applicant_name.match(nameRegexFormatter3);

            if (validfirstUsername12 == null) {

                this.resultApplicantName = 'username must contain atleast 1 uppercase,1 Lowercase';

            }
            else {
                this.resultApplicantName = '';
            }


            if (this.applicant_name == '') {
                this.resultApplicantName = '';
            }



            var nameRegexFormatter4 = /^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{3,}$/;

            var validfirstUsername121 = this.applicant_last_name.match(nameRegexFormatter4);

            if (validfirstUsername121 == null) {

                this.resultApplicantLastName = 'username must contain atleast 1 uppercase,1 Lowercase';

            }
            else {
                this.resultApplicantLastName = '';
            }


            if (this.applicant_last_name == '') {
                this.resultApplicantLastName = '';
            }


            var phoneRegexFormatter2 = /^\d{10}$/;
            var number = document.getElementById("icon_telephone").value;
            

            var validfirstContact = this.telephone_number.match(phoneRegexFormatter2);

            if (validfirstContact == null) {

                
                
                this.resultTelephone = 'phone number must contain only 10 digits';

            }
            else {
                this.resultTelephone = '';
            }


            if (this.telephone_number == '') {
                this.resultTelephone = '';
            }




        }
    }
})

   
