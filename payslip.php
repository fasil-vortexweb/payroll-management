<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['employeeId'])) {
    $employeeId = $_POST['employeeId'];

    $employees = include('employees.php');
    $employee = null;

    foreach ($employees as $emp) {
        if ($emp['ufCrm40_1726316974380'] == $employeeId) {
            $employee = $emp;
            break;
        }
    }

    if ($employee) {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Payslip for {$employee['NAME']}</title>
            <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js'></script>
        </head>
        <body>
            <div class='container my-5'>
                <div id='payslip' class='card'>
                    <div class='card-header text-center'>
                        <img src='https://springfieldproperties.ae/wp-content/uploads/2023/06/Springfield-Properties-logo-1-1024x263.png' alt='Company Logo' class='img-fluid mb-3' style='max-width: 250px;'>
                        
                        <p>Office 104, 105 & 106, Bay Square, Building 2, Business Bay, Dubai, UAE</p>
                    </div>
                    <div class='card-body'>
                        <form>
                            <h4>Employee Details</h4>
                            <div class='form-group'>
                                <label for='employeeId'>Employee ID:</label>
                                <input type='text' class='form-control' id='employeeId' value='{$employee['ufCrm40_1726316974380']}' disabled>
                            </div>
                            <div class='form-group'>
                                <label for='name'>Name:</label>
                                <input type='text' class='form-control' id='name' value='{$employee['ufCrm40_1726316965739']}' disabled>
                            </div>
                           
                            <h4>Salary Details</h4>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <h4>Earnings</h4>
                                    <div class='form-group'>
                                        <label for='basic'>Basic:</label>
                                        <input type='text' class='form-control' id='basic' value='{$employee['ufCrm40_1726317023423']}' disabled>
                                    </div>
                                    <div class='form-group'>
                                        <label for='da'>DA (40%):</label>
                                        <input type='text' class='form-control' id='da' value='{$employee['ufCrm40_1726317043138']}' disabled>
                                    </div>
                                    <div class='form-group'>
                                        <label for='hra'>HRA (15%):</label>
                                        <input type='text' class='form-control' id='hra' value='{$employee['ufCrm40_1726317056585']}' disabled>
                                    </div>
                                    <div class='form-group'>
                                        <label for='conveyance'>Conveyance:</label>
                                        <input type='text' class='form-control' id='conveyance' value='{$employee['ufCrm40_1726317073737']}' disabled>
                                    </div>
                                    <div class='form-group'>
                                        <label for='allowance'>Allowance:</label>
                                        <input type='text' class='form-control' id='allowance' value='{$employee['ufCrm40_1726317091326']}' disabled>
                                    </div>
                                    <div class='form-group'>
                                        <label for='medicalAllowance'>Medical Allowance:</label>
                                        <input type='text' class='form-control' id='medicalAllowance' value='{$employee['ufCrm40_1726317106914']}' disabled>
                                    </div>
                                </div>                            
                                <div class='col-md-6'>
                                    <h4>Deductions</h4>
                                    <div class='form-group'>
                                        <label for='tds'>TDS:</label>
                                        <input type='text' class='form-control' id='tds' value='{$employee['ufCrm40_1726317034173']}' disabled>
                                    </div>
                                    <div class='form-group'>
                                        <label for='esi'>ESI:</label>
                                        <input type='text' class='form-control' id='esi' value='{$employee['ufCrm40_1726317049030']}' disabled>
                                    </div>
                                    <div class='form-group'>
                                        <label for='pf'>PF:</label>
                                        <input type='text' class='form-control' id='pf' value='{$employee['ufCrm40_1726317064611']}' disabled>
                                    </div>
                                    <div class='form-group'>
                                        <label for='leave'>Leave:</label>
                                        <input type='text' class='form-control' id='leave' value='{$employee['ufCrm40_1726317080335']}' disabled>
                                    </div>
                                    <div class='form-group'>
                                        <label for='profTax'>Prof. Tax:</label>
                                        <input type='text' class='form-control' id='profTax' value='{$employee['ufCrm40_1726317099237']}' disabled>
                                    </div>
                                    <div class='form-group'>
                                        <label for='labourWelfare'>Labour Welfare:</label>
                                        <input type='text' class='form-control' id='labourWelfare' value='{$employee['ufCrm40_1726317115510']}' disabled>
                                    </div>
                                </div>                            
                            </div>
                            <div class='form-group'>
                                <label for='salary'>Net Salary:</label>
                                <input type='text' class='form-control' id='salary' value='{$employee['ufCrm40_1726317122244']}' disabled>
                            </div>
                        </form>
                    </div>
                    <div class='card-footer text-center'>
                        <button class='btn btn-primary' onclick='downloadCSV()'>Download CSV</button>
                        <button class='btn btn-secondary' onclick='downloadPDF()'>Download PDF</button>
                    </div>
                </div>
            </div>
            <script>
                function downloadCSV() {
                    const data = [
                        ['ID', 'Name', 'Net Salary', 'Basic', 'DA', 'HRA', 'Conveyance', 'Allowance', 'Medical Allowance', 'TDS', 'ESI', 'PF', 'Leave', 'Prof. Tax', 'Labour Welfare'],
                        ['{$employee['ufCrm40_1726316974380']}', '{$employee['ufCrm40_1726316965739']}', '{$employee['ufCrm40_1726317122244']}', '{$employee['ufCrm40_1726317023423']}', '{$employee['ufCrm40_1726317043138']}', '{$employee['ufCrm40_1726317056585']}', '{$employee['ufCrm40_1726317073737']}', '{$employee['ufCrm40_1726317091326']}', '{$employee['ufCrm40_1726317106914']}', '{$employee['ufCrm40_1726317034173']}', '{$employee['ufCrm40_1726317049030']}', '{$employee['ufCrm40_1726317064611']}', '{$employee['ufCrm40_1726317080335']}', '{$employee['ufCrm40_1726317099237']}', '{$employee['ufCrm40_1726317115510']}'],
                    ];

                    let csvContent = 'data:text/csv;charset=utf-8,';
                    data.forEach(row => {
                        csvContent += row.join(',') + '\\r\\n';
                    });

                    const encodedUri = encodeURI(csvContent);
                    const link = document.createElement('a');
                    link.setAttribute('href', encodedUri);
                    link.setAttribute('download', 'payslip for {$employee['ufCrm40_1726316974380']}.csv');
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                }

                function downloadPDF() {
                    const { jsPDF } = window.jspdf;
                    const doc = new jsPDF();
                    
                    doc.setFontSize(18);
                    doc.text('Payslip', 14, 22);
                    doc.setFontSize(12);
                    doc.text('Springfield Properties', 14, 30);
                    doc.text('Office 104, 105 & 106, Bay Square, Building 2, Business Bay, Dubai, UAE', 14, 36);
                    
                    doc.setFontSize(14);
                    doc.text('Employee Details', 14, 46);
                    doc.setFontSize(12);
                    doc.text('Employee ID: {$employee['ufCrm40_1726316974380']}', 14, 54);
                    doc.text('Name: {$employee['ufCrm40_1726316965739']}', 14, 60);
                    
                    
                    doc.setFontSize(14);
                    doc.text('Salary Details', 14, 76);
                    doc.setFontSize(12);
                    
                    const earnings = [
                        ['Basic', '{$employee['ufCrm40_1726317023423']}'],
                        ['DA (40%)', '{$employee['ufCrm40_1726317043138']}'],
                        ['HRA (15%)', '{$employee['ufCrm40_1726317056585']}'],
                        ['Conveyance', '{$employee['ufCrm40_1726317073737']}'],
                        ['Allowance', '{$employee['ufCrm40_1726317091326']}'],
                        ['Medical Allowance', '{$employee['ufCrm40_1726317106914']}']
                    ];
                    const deductions = [
                        ['TDS', '{$employee['ufCrm40_1726317034173']}'],
                        ['ESI', '{$employee['ufCrm40_1726317049030']}'],
                        ['PF', '{$employee['ufCrm40_1726317064611']}'],
                        ['Leave', '{$employee['ufCrm40_1726317080335']}'],
                        ['Prof. Tax', '{$employee['ufCrm40_1726317099237']}'],
                        ['Labour Welfare', '{$employee['ufCrm40_1726317115510']}']
                    ];
                    
                    doc.autoTable({
                        head: [['Earnings', 'Amount']],
                        body: earnings,
                        startY: 80,
                        theme: 'grid'
                    });
                    
                    doc.autoTable({
                        head: [['Deductions', 'Amount']],
                        body: deductions,
                        startY: doc.previousAutoTable.finalY + 10,
                        theme: 'grid'
                    });
                    
                    doc.text('Net Salary: {$employee['ufCrm40_1726317122244']}', 14, doc.previousAutoTable.finalY + 20);
                    
                    doc.save('payslip for {$employee['ufCrm40_1726316965739']}.pdf');
                }
            </script>
        </body>
        </html>";
    } else {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Employee Not Found</title>
            <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body>
            <div class='container mt-5'>
                <div class='alert alert-danger'>
                    <strong>Error:</strong> Employee not found.
                </div>
            </div>
        </body>
        </html>";
    }
} else {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Invalid Request</title>
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
    </head>
    <body>
        <div class='container mt-5'>
            <div class='alert alert-danger'>
                <strong>Error:</strong> Invalid request.
            </div>
        </div>
    </body>
    </html>";
}
