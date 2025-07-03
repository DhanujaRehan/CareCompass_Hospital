document.querySelector('.calculate-btn').addEventListener('click', () => {
    const patientName = document.getElementById('patient-name').value.trim();
    const serviceType = document.getElementById('service-type').value;
    const doctorName = document.getElementById('doctor-name').value.trim();
    const doctorCost = parseFloat(document.getElementById('doctor-cost').value) || 0;
    const doctorTime = parseFloat(document.getElementById('doctor-time').value) || 0;
    const hospitalCharges = parseFloat(document.getElementById('hospital-charges').value) || 0;
    const daysAdmitted = parseFloat(document.getElementById('days-admitted').value) || 0;
    const additionalCost = parseFloat(document.getElementById('additional-cost').value) || 0;

    let serviceCost = 0;
    switch (serviceType) {
        case 'Not Selected':
            serviceCost = 0;
            break;
        case 'Lab Test - 1000':
            serviceCost = 1000;
            break;
        case 'Surgery - 100000':
            serviceCost = 100000;
            break;
        case 'Consultation - 2500':
            serviceCost = 2500;
            break;
        case 'OPD - 2500':
            serviceCost = 2500;
            break;
        case 'Emergency - 2000':
            serviceCost = 2000;
            break;
        case 'Eye checkup - 1500':
            serviceCost = 1500;
            break;
        case 'CT-Scan - 5000':
            serviceCost = 5000;
            break;
        case 'Ultra sound imaging - 6000':
            serviceCost = 6000;
            break;
        case 'Medical report - 1500':
            serviceCost = 1500;
            break;

    }

    const totalAmount = serviceCost + doctorCost * doctorTime + hospitalCharges * daysAdmitted + additionalCost;

    const totalElement = document.getElementById('total-amount');
    totalElement.textContent = `Total Amount: Rs.${totalAmount.toFixed(2)}`;
    totalElement.style.color = "#f4a261";
});

document.querySelector('.print-btn').addEventListener('click', () => {
    const patientName = document.getElementById('patient-name').value.trim();
    const serviceType = document.getElementById('service-type').value;
    const doctorName = document.getElementById('doctor-name').value.trim();
    const doctorCost = parseFloat(document.getElementById('doctor-cost').value) || 0;
    const doctorTime = parseFloat(document.getElementById('doctor-time').value) || 0;
    const hospitalCharges = parseFloat(document.getElementById('hospital-charges').value) || 0;
    const daysAdmitted = parseFloat(document.getElementById('days-admitted').value) || 0;
    const additionalCost = parseFloat(document.getElementById('additional-cost').value) || 0;

    let serviceCost = 0;

    switch (serviceType) {
        case 'Not Selected':
            serviceCost = 0;
            break;
        case 'Lab Test - 1000':
            serviceCost = 1000;
            break;
        case 'Surgery - 100000':
            serviceCost = 100000;
            break;
        case 'Consultation - 2500':
            serviceCost = 2500;
            break;
        case 'OPD - 2500':
            serviceCost = 2500;
            break;
        case 'Emergency - 2000':
            serviceCost = 2000;
            break;
        case 'Eye checkup - 1500':
            serviceCost = 1500;
            break;
        case 'CT-Scan - 5000':
            serviceCost = 5000;
            break;
        case 'Ultra sound imaging - 6000':
            serviceCost = 6000;
            break;
        case 'Medical report - 1500':
            serviceCost = 1500;
            break;

    }

    const totalAmount = serviceCost + (doctorCost * doctorTime) + (hospitalCharges * daysAdmitted) + additionalCost;

    const billSummary = `
        <html>
            <head>
                <title>Care Compass Hospital - Bill</title>
                 <link rel="icon" href="images/logoc.ico">
                <style>
                :root {
    --maincolor: #001d42;
    --secondcolor: #0386f8;
    --thirdcolor: #7ef9f9;
    --textcolor: #4A5764;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
    text-transform: capitalize;
    transition: all .2s linear;
    font-family: "Poppins", sans-serif;

}

html {
    font-size: 62.5%;
    overflow-x: hidden;
    scroll-behavior: smooth;
    scroll-padding-top: 6rem;
}
    body {
    align-items: center;
    justify-content: center;
    display: flex;
    flex-direction: column;
    text-align: center;
    }
                    .bill-summary {
                        background: rgb(255, 255, 255);
                        color: var(--textcolor);
                        padding: 20px;
                        border-radius: 8px;
                        display: inline-block;
                    }
                        .bill-summary h2 {
                        color: var(--maincolor);
                        padding: 20px;
                        align-items: center;
                        justify-content: center;
                        text-align: center;
                        }
                        .bill-summary h1 {
                        color: black;
                        padding: 20px;
                        align-items: center;
                        justify-content: center;
                        text-align: center;
                        }

                        .bill-summary p1 {
                            color: black;
                            padding: 10px;
                        }
                            .bill-summary p2 {
                            color: var(--secondcolor);s
                            padding: 10px;
                        }
                            .bill-summary p {
                            text-align: left;
}
                </style>
            </head>
            <body>
                   <div class="bill-summary">
                    <h2>Care Compass Hospital</h2>
                    <h1>Bill Summary</h1>
                    <p><strong>Patient Name:</strong> ${patientName}</p>
                    <p><strong>Doctor Name:</strong> ${doctorName}</p>
                    <p><strong>Service Type:</strong> ${serviceType}</p>
                    <p><strong>Doctor Cost:</strong> Rs${doctorCost.toFixed(2)}</p>
                    <p><strong>Hospital Charges:</strong> Rs${hospitalCharges.toFixed(2)}</p>
                    <p><strong>Additional Cost:</strong> Rs${additionalCost.toFixed(2)}</p><br>
                    <p1><strong>Total Amount:</strong> Rs${totalAmount.toFixed(2)}</p><br>
                    <p2>Thank you for choosing Care Compass Hospital.</p>
                    <p2>Stay Safe, Stay Healthy</p>
                    <p2>ආයුබෝවන් ! Welcome ! வணக்கம்!</p>


                </div>
            </body>
        </html>
    `;

    const printWindow = window.open('', '_blank');
    printWindow.document.open();
    printWindow.document.write(billSummary);
    printWindow.document.close();
    printWindow.print();
});

const patientName = document.getElementById('patient-name').value.trim();
const modal = document.getElementById('discharge-modal');
const dischargeBtn = document.querySelector('.discharge-btn');
const closeBtn = document.querySelector('.close-btn');
const confirmBtn = document.getElementById('confirm-discharge');
const cancelBtn = document.getElementById('cancel-discharge');

dischargeBtn.addEventListener('click', () => {
    modal.style.display = 'block';
});
closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});
cancelBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});
confirmBtn.addEventListener('click', () => {
    alert('Patient discharged ' + patientName +' successfully!');
    modal.style.display = 'none';
});

window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});