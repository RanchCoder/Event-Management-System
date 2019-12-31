new Vue({
    el: '#formInput',
    data: {
        username: '',
        email: '',
        password: '',
        repassword: '',

        resultname: '',
        resultemail: '',
        resultpass: '',
        resultpass1: ''
    },
    methods: {

        checkCredential: function () {
            var nameRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

            var validfirstUsername = this.username.match(nameRegex);
            if (validfirstUsername == null) {

                this.resultname = 'username must contain atleast 1 uppercase,1 Lowercase,1digit';

            }
            else {
                this.resultname = '';
            }


            if (this.username == '') {
                this.resultname = '';
            }

        },

        checkCredential1: function () {

            var nameRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

            var validfirstemail = this.email.match(nameRegex);
            if (validfirstemail == null) {

                this.resultemail = '';

            }
            else {
                this.resultemail = '';
            }

            if (this.email == '') {
                this.resultemail = '';
            }




        },

        checkCredential2: function () {

            var nameRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;

            var validfirstPassword = this.password.match(nameRegex);
            if (validfirstPassword == null) {

                this.resultpass1 = 'password must contain atleast 1 UpperCase letter,1 number,1 special character and intotal 8 character';

            }
            else {

                this.resultpass1 = '';

            }
            if (this.password == '') {
                this.resultpass1 = '';
            }

            if (this.repassword != this.password) {
                this.resultpass = 'password does not match';
            }
            else {

                this.resultpass = '';

            }
            if (this.repassword == '') {
                this.resultpass = '';
            }




        }
    }
})

new Vue({
    el: '#formInputLogin',
    data: {
        email1: '',
        password: '',
        resultEmail: '',
        username1: '',
        resultName: ''
    },
    methods: {


        checkCredentialName: function () {
            var nameRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

            var validfirstUsername = this.username1.match(nameRegex);
            if (validfirstUsername == null) {

                this.resultName = 'username must contain atleast 1 uppercase,1 Lowercase,1digit';

            }
            else {
                this.resultName = '';
            }


            if (this.username1 == '') {
                this.resultName = '';
            }

        },


        checkCredentialsEmail: function () {
            var nameRegex1 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var validfirstemail1 = this.email1.match(nameRegex1);
            if (validfirstemail1 == null) {

                this.resultEmail = 'invalid email';

            }

            else {
                this.resultEmail = '';
            }

            if (this.email1 == '') {
                this.resultEmail = '';
            }
        }
    }
})

new Vue({
    el: '#personal-data-customer',
    data: {
        message:'hello budy',
        company_name:'',
        owner_name:'',
        telephone_number:'',
        resultCompanyName:'',
        resultOwnerName:'',
        resultTelephone:''

    },
    methods: {
        checkCredentialFormatter: function () {

            var nameRegexFormatter = /^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\s+]{8,}$/;

            var validfirstUsername = this.company_name.match(nameRegexFormatter);

            if (validfirstUsername == null) {

                this.resultCompanyName = 'username must contain atleast 1 uppercase,1 Lowercase and 8 characters';

            }
            else {
                this.resultCompanyName = '';
            }


            if (this.company_name == '') {
                this.resultCompanyName = '';
            }
            

            var nameRegexFormatter1 = /^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\s+]{8,}$/;

            var validfirstUsername1 = this.owner_name.match(nameRegexFormatter);

            if (validfirstUsername1 == null) {

                this.resultOwnerName = 'name must contain atleast 1 uppercase,1 Lowercase and 8 characters';

            }
            else {
                this.resultOwnerName = '';
            }


            if (this.owner_name == '') {
                this.resultOwnerName = '';
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


