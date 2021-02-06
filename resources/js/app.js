/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-default.css";

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.use(VueToast);
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    data() {
        return {
            form: {
                name: "",
                email: "",
                phone: "",
                message: ""
            },
            errorMessage: "",
            sending: false
        };
    },
    methods: {
        sendMessage: function() {
            this.sending = true;
            if (this.form.name == "") {
                this.errorMessage = "Favor de ingresar tu nombre";
                this.sending = false;
                return;
            }

            if (this.form.phone == "") {
                this.errorMessage = "Favor de ingresar su teléfono";
                this.sending = false;
                return;
            }

            if (this.form.email == "") {
                this.errorMessage = "Favor de ingresar tu correo";
                this.sending = false;
                return;
            }

            if (!this.validEmail(this.form.email)) {
                this.errorMessage = "El correo electrónico debe ser válido.";
                this.sending = false;
                return;
            }

            if (this.form.message == "") {
                this.errorMessage = "Favor de ingresar el mensaje";
                this.sending = false;
                return;
            }
            axios
                .post("/api/send-contact", this.form)
                .then(response => {
                    this.emptyForm();
                    if (response.status == 200) {
                        this.$toast.open({
                            message:
                                "Tu mensaje fué enviado con éxito, pronto nos pondremos en contacto con usted.",
                            type: "success",
                            duration: 5000,
                            position: "bottom",
                            dismissible: true
                        });
                    }
                    this.sending = false;
                    return;
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        const errors = Object.values(
                            error.response.data.errors
                        );
                        errors.forEach(element => {
                            this.$toast.open({
                                message: element[0],
                                type: "error",
                                duration: 5000,
                                position: "bottom",
                                dismissible: true
                            });
                        });
                    } else {
                        this.$toast.open({
                            message:
                                "Ocurrió un error inesperado al enviar el mensaje.",
                            type: "error",
                            duration: 5000,
                            position: "bottom",
                            dismissible: true
                        });
                    }
                    this.sending = false;
                    return;
                });
        },
        validEmail: function(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        emptyForm: function() {
            this.form.name = "";
            this.form.email = "";
            this.form.subjetc = "";
            this.form.phone = "";
            this.form.message = "";
        }
    }
});
