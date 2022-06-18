@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    color: #2c2c2c;
}

body a {
    color: inherit;
    text-decoration: none;
}

.header {
    max-width: 600px;
    margin: 50px auto;
    text-align: center;
}

.header__title {
    margin-bottom: 30px;
    font-size: 2.1rem;
}

.content {
    width: 95%;
    margin: 0 auto 50px;
}

.content__title {
    margin-bottom: 40px;
    font-size: 20px;
    text-align: center;
}

.content__title--m-sm {
    margin-bottom: 10px;
}

.multisteps-form__progress {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
}

.multisteps-form__progress-btn {
    transition-property: all;
    transition-duration: 0.15s;
    transition-timing-function: linear;
    transition-delay: 0s;
    position: relative;
    padding-top: 20px;
    color: rgba(108, 117, 125, 0.7);
    text-indent: -9999px;
    border: none;
    background-color: transparent;
    outline: none !important;
    cursor: pointer;
}

@media (min-width: 500px) {
    .multisteps-form__progress-btn {
        text-indent: 0;
    }
}

.multisteps-form__progress-btn:before {
    position: absolute;
    top: 0;
    left: 50%;
    display: block;
    width: 13px;
    height: 13px;
    content: '';
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    transition: all 0.15s linear 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
    transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
    transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
    border: 2px solid currentColor;
    border-radius: 50%;
    background-color: #fff;
    box-sizing: border-box;
    z-index: 3;
}

.multisteps-form__progress-btn:after {
    position: absolute;
    top: 5px;
    left: calc(-50% - 13px / 2);
    transition-property: all;
    transition-duration: 0.15s;
    transition-timing-function: linear;
    transition-delay: 0s;
    display: block;
    width: 100%;
    height: 2px;
    content: '';
    background-color: currentColor;
    z-index: 1;
}

.multisteps-form__progress-btn:first-child:after {
    display: none;
}

.multisteps-form__progress-btn.js-active {
    color: #007bff;
}

.multisteps-form__progress-btn.js-active:before {
    -webkit-transform: translateX(-50%) scale(1.2);
    transform: translateX(-50%) scale(1.2);
    background-color: currentColor;
}

.multisteps-form__form {
    position: relative;
}

.multisteps-form__panel {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 0;
    opacity: 0;
    visibility: hidden;
}

.multisteps-form__panel.js-active {
    height: auto;
    opacity: 1;
    visibility: visible;
}

.multisteps-form__panel[data-animation="scaleOut"] {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}

.multisteps-form__panel[data-animation="scaleOut"].js-active {
    transition-property: all;
    transition-duration: 0.2s;
    transition-timing-function: linear;
    transition-delay: 0s;
    -webkit-transform: scale(1);
    transform: scale(1);
}

.multisteps-form__panel[data-animation="slideHorz"] {
    left: 50px;
}

.multisteps-form__panel[data-animation="slideHorz"].js-active {
    transition-property: all;
    transition-duration: 0.25s;
    transition-timing-function: cubic-bezier(0.2, 1.13, 0.38, 1.43);
    transition-delay: 0s;
    left: 0;
}

.multisteps-form__panel[data-animation="slideVert"] {
    top: 30px;
}

.multisteps-form__panel[data-animation="slideVert"].js-active {
    transition-property: all;
    transition-duration: 0.2s;
    transition-timing-function: linear;
    transition-delay: 0s;
    top: 0;
}

.multisteps-form__panel[data-animation="fadeIn"].js-active {
    transition-property: all;
    transition-duration: 0.3s;
    transition-timing-function: linear;
    transition-delay: 0s;
}

.multisteps-form__panel[data-animation="scaleIn"] {
    -webkit-transform: scale(0.9);
    transform: scale(0.9);
}

.multisteps-form__panel[data-animation="scaleIn"].js-active {
    transition-property: all;
    transition-duration: 0.2s;
    transition-timing-function: linear;
    transition-delay: 0s;
    -webkit-transform: scale(1);
    transform: scale(1);
}
</style>


@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Client Onboarding @endslot
@endcomponent


<div class="multisteps-form">
    <!--progress bar-->
    <div class="row">
        <div class="col-12 col-lg-12  mb-4">
            <div class="multisteps-form__progress">
                <button class="multisteps-form__progress-btn js-active  px-2" type="button" title="User Info">Personal
                    Details</button>
                <button class="multisteps-form__progress-btn px-2" type="button" title="Address">Location
                    Details</button>
                <button class="multisteps-form__progress-btn px-2" type="button" title="Order Info">Official
                    Details</button>
                <button class="multisteps-form__progress-btn px-2" type="button" title="Comments">Family
                    Details</button>
                <button class="multisteps-form__progress-btn px-2" type="button" title="Comments">Statutory
                    Details</button>
            </div>
        </div>
    </div>
    <!--form panels-->
    <div class="row">
        <div class="col-12 col-lg-12 m-auto">
            <form class="multisteps-form__form">
                <!--single form panel-->
                <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                    <h5 class="multisteps-form__title ">User Info</h5>
                    <!-- <hr class="bottom-dash "> -->
                    <div class="multisteps-form__content">
                        <div class="form-row row mt-4">
                            <div class="col-12 col-sm-6">
                                <input class="multisteps-form__input form-control" type="text"
                                    placeholder="First Name" />
                            </div>
                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                <input class="multisteps-form__input form-control" type="text"
                                    placeholder="Last Name" />
                            </div>
                        </div>
                        <div class="form-row row  mt-4">
                            <div class="col-12 col-sm-6">
                                <input class="multisteps-form__input form-control" type="text" placeholder="Login" />
                            </div>
                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                <input class="multisteps-form__input form-control" type="text" placeholder="Email" />
                            </div>
                        </div>
                        <div class="form-row row mt-4">
                            <div class="col-12 col-sm-6">
                                <input class="multisteps-form__input form-control" type="password"
                                    placeholder="Password" />
                            </div>
                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                <input class="multisteps-form__input form-control" type="password"
                                    placeholder="Repeat Password" />
                            </div>
                        </div>
                        <div class="button-row d-flex justify-content-end mt-4">
                            <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                        </div>
                    </div>
                </div>

                <!--single form panel-->
                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                    <h4 class="multisteps-form__title">Address</h4>
                    <div class="multisteps-form__content">
                        <div class="form-row row mt-4">
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 scrollBar">
                                <textarea class="form-control" id="addressone" placeholder="Address 1" cols="10"
                                    rows="2"></textarea>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 scrollBar">
                                <textarea class="form-control" id="addresstwo" placeholder="Address 2" cols="10"
                                    rows="2"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="form-row row mt-4">
                        <div class="col-12 col-md-6 col-xl-6 col-lg-6">
                            <input class="multisteps-form__input form-control" type="text" placeholder="City" />
                        </div>
                        <div class="col-12 col-md-6 col-xl-6 col-lg-6">
                            <select class="multisteps-form__select form-control">
                                <option selected="selected">State...</option>
                                <option>...</option>
                                <option>...</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-row row mt-4">
                        <div class="col-12 col-md-6 col-xl-6 col-lg-6">
                            <input class="multisteps-form__input form-control" type="text" placeholder="Country" />
                        </div>
                        <div class="col-12 col-md-6 col-xl-6 col-lg-6">
                        <input class="multisteps-form__input form-control" type="text" placeholder="Pin Code" />
                        </div>

                    </div>
                    <div class="button-row d-flex mt-4 justify-content-end">
                        <button class="btn btn-primary mx-2 js-btn-prev" type="button" title="Prev">Prev</button>
                        <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                </div>


                <!--single form panel-->
                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                    <h4 class="multisteps-form__title">Your Order Info</h4>
                    <div class="multisteps-form__content">
                        <div class="row">
                            <div class="col-12 col-md-6 mt-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">Item Title</h5>
                                        <p class="card-text">Small and nice item description</p><a
                                            class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">Item Title</h5>
                                        <p class="card-text">Small and nice item description</p><a
                                            class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="button-row d-flex mt-4 col-12 justify-content-end">
                                <button class="btn btn-primary js-btn-prev mx-2" type="button"
                                    title="Prev">Prev</button>
                                <button class="btn btn-primary ml-auto js-btn-next" type="button"
                                    title="Next">Next</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--single form panel-->
                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                    <h4 class="multisteps-form__title">Your Order Info</h4>
                    <div class="multisteps-form__content">
                        <div class="row">
                            <div class="col-12 col-md-6 mt-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">Item Title</h5>
                                        <p class="card-text">Small and nice item description</p><a
                                            class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">Item Title</h5>
                                        <p class="card-text">Small and nice item description</p><a
                                            class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="button-row d-flex mt-4 col-12 justify-content-end">
                                <button class="btn btn-primary js-btn-prev mx-2" type="button"
                                    title="Prev">Prev</button>
                                <button class="btn btn-primary ml-auto js-btn-next" type="button"
                                    title="Next">Next</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--single form panel-->
                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                    <h4 class="multisteps-form__title">Additional Comments</h4>
                    <div class="multisteps-form__content">
                        <div class="form-row row mt-4">
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 scrollBar">
                                <textarea class="form-control" id="addressone" placeholder="Address 1" cols="10"
                                    rows="2"></textarea>
                            </div>
                        </div>
                        <div class="button-row d-flex mt-4 justify-content-end">
                            <button class="btn btn-primary js-btn-prev mx-2" type="button" title="Prev">Prev</button>
                            <button class="btn btn-success ml-auto" type="button" title="Send">Send</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>







@endsection
@section('script')

<!-- ui notifications -->

<script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/notifications.init.js') }}"></script>
<!-- apexcharts -->

<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script type="text/javascript">
const DOMstrings = {
    stepsBtnClass: 'multisteps-form__progress-btn',
    stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
    stepsBar: document.querySelector('.multisteps-form__progress'),
    stepsForm: document.querySelector('.multisteps-form__form'),
    stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
    stepFormPanelClass: 'multisteps-form__panel',
    stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
    stepPrevBtnClass: 'js-btn-prev',
    stepNextBtnClass: 'js-btn-next'
};


const removeClasses = (elemSet, className) => {

    elemSet.forEach(elem => {

        elem.classList.remove(className);

    });

};

const findParent = (elem, parentClass) => {

    let currentNode = elem;

    while (!currentNode.classList.contains(parentClass)) {
        currentNode = currentNode.parentNode;
    }

    return currentNode;

};

const getActiveStep = elem => {
    return Array.from(DOMstrings.stepsBtns).indexOf(elem);
};

const setActiveStep = activeStepNum => {

    removeClasses(DOMstrings.stepsBtns, 'js-active');

    DOMstrings.stepsBtns.forEach((elem, index) => {

        if (index <= activeStepNum) {
            elem.classList.add('js-active');
        }

    });
};

const getActivePanel = () => {

    let activePanel;

    DOMstrings.stepFormPanels.forEach(elem => {

        if (elem.classList.contains('js-active')) {

            activePanel = elem;

        }

    });

    return activePanel;

};

const setActivePanel = activePanelNum => {

    removeClasses(DOMstrings.stepFormPanels, 'js-active');

    DOMstrings.stepFormPanels.forEach((elem, index) => {
        if (index === activePanelNum) {

            elem.classList.add('js-active');

            setFormHeight(elem);

        }
    });

};

const formHeight = activePanel => {

    const activePanelHeight = activePanel.offsetHeight;

    DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

};

const setFormHeight = () => {
    const activePanel = getActivePanel();

    formHeight(activePanel);
};

DOMstrings.stepsBar.addEventListener('click', e => {

    const eventTarget = e.target;

    if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
        return;
    }

    const activeStep = getActiveStep(eventTarget);

    setActiveStep(activeStep);

    setActivePanel(activeStep);
});

DOMstrings.stepsForm.addEventListener('click', e => {

    const eventTarget = e.target;

    if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(
            `${DOMstrings.stepNextBtnClass}`))) {
        return;
    }

    const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);

    let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

    if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
        activePanelNum--;

    } else {

        activePanelNum++;

    }

    setActiveStep(activePanelNum);
    setActivePanel(activePanelNum);

});

window.addEventListener('load', setFormHeight, false);

window.addEventListener('resize', setFormHeight, false);


const setAnimationType = newType => {
    DOMstrings.stepFormPanels.forEach(elem => {
        elem.dataset.animation = newType;
    });
};

//changing animation
const animationSelect = document.querySelector('.pick-animation__select');

animationSelect.addEventListener('change', () => {
    const newAnimationType = animationSelect.value;

    setAnimationType(newAnimationType);
});
</script>
@endsection