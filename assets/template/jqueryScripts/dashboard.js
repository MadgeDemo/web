$(document).ready(function(){

  $.post($getEntitlementsURL,function(data, status){
    // console.log(data);
    // console.log(JSON.parse(data));

    $data = JSON.parse(data);
    // console.log($data);
    $('#annualLeaveChart').hide();
    $('#sickLeaveChart').hide();
    // $('#offdaysChart').hide();
    $('#ParternityLeaveChart').hide();

    //Begining of Bakasa's implementation
    annualEntitlement = 0;
    annualDaysUsed    = 0;
    annualTitle       = "";
    sickEntitlement   = 0;
    sickDaysUsed      = 0;
    sickTitle         = "";
    patmatEntitlement = 0;
    patmatDaysUsed    = 0;
    patmatTitle       = "";
    
    for (var i = $data.length - 1; i >= 0; i--) {
        if ($data[i]['entitlementCode'] == 'ANNUAL') {
            annualEntitlement = parseInt($data[i]['totalEntitlementForPayment']);
            annualDaysUsed += parseInt($data[i]['daysUsed']) || 0;
            annualTitle = $data[i]['entitlementCode'];
        } else if ($data[i]['entitlementCode'] == 'SICK') {
            sickEntitlement = parseInt($data[i]['totalEntitlementForPayment']);
            sickDaysUsed += parseInt($data[i]['daysUsed']) || 0;
            sickTitle = $data[i]['entitlementCode'];
        } else if ($data[i]['entitlementCode'] == 'PATERNITY' || $data[i]['entitlementCode'] == 'MATERNITY') {
            patmatEntitlement = parseInt($data[i]['totalEntitlementForPayment']);
            patmatDaysUsed += parseInt($data[i]['daysUsed']) || 0;
            patmatTitle = $data[i]['entitlementCode'];
        }
    }
    
    //Begining of sick Leave donut chart plot
    $("#sickLeaveChart h2").html("Total: "+sickEntitlement+" days");
    $("#sickLeaveChart span").html(sickTitle+" Leave");
    $('#sickLeaveChart').show();
    Morris.Donut({
      element: 'graph_donut3',
      data: [
        {label: 'Used', value: sickDaysUsed },
        {label: 'Available', value: sickEntitlement-sickDaysUsed}
      ],
      colors: ['#ff0000', '#FF4C4C'],
      formatter: function (y) {
        return y + " days";
      },
      resize: true
    });
    //End of sick leave donut chart plot

    //Begining of the annual leave donut chart plot
    $("#annualLeaveChart h2").html("Total: "+annualEntitlement+" days");
    $("#annualLeaveChart span").html(annualTitle+" Leave");
    $('#annualLeaveChart').show();
    Morris.Donut({
        element: 'graph_donut4',
        data: [
          {label: 'Used', value: annualDaysUsed},
          {label: 'Available', value: annualEntitlement-annualDaysUsed}
        ],
        colors: ['#16701c', '#80ed88'],
        formatter: function (y) {
          return y + " days";
        },
        resize: true
    });
    //End of the annual leave donut chart plot

    //Begining of the Maternity/Paternity leave donut chart plot
    $("#ParternityLeaveChart h2").html("Total: "+patmatEntitlement+" days");
    $("#ParternityLeaveChart span").html(patmatTitle+" Leave");
    $("#ParternityLeaveChart").show();
    Morris.Donut({
        element: 'graph_donut',
        data: [
          {label: 'Used', value: patmatDaysUsed},
          {label: 'Available', value: patmatEntitlement-patmatDaysUsed}
        ],
        colors: ['#16701c', '#80ed88'],
        formatter: function (y) {
          return y + " days";
        },
        resize: true
      });
    //End of the Maternity/Paternity leave donut chart plot

    //End of Bakasa's implementation

    // for($i=0; $i<$data.length; $i++){
      // entitlementDescription = $data[$i]['entitlementCode'];
      // $totalEntitlementForPayment = Math.ceil($data[$i]['totalEntitlementForPayment']);
      // $entitlementCode = $data[$i]['entitlementCode'];
      // //$entitlementForPayment = $data[$i]['entitlementForPayment'];
      // $totalDaysUsed = $data[$i]['daysUsed'];
      // $totalDaysAvailable = $data[$i]['daysAvaliable'];

      // if($totalDaysUsed == null || $totalDaysUsed == undefined || $totalDaysUsed == ''){
      //   $daysRemaining = $totalEntitlementForPayment;
      //   $totalDaysUsed = 0;
      // }else{
      //   $daysRemaining = $totalEntitlementForPayment  - $totalDaysUsed;
      // }

      // if(entitlementDescription == 'SICK'){    
          // $("#sickLeaveChart h2").html("Total: "+$totalEntitlementForPayment+" days");
          // $("#sickLeaveChart span").html(entitlementDescription+" Leave");
          // $('#sickLeaveChart').show();

          // if($totalDaysUsed == 0){
          //   Morris.Donut({
          //     element: 'graph_donut3',
          //     data: [
          //       {label: 'Available', value: $totalEntitlementForPayment}
          //     ],
          //     colors: ['#ff0000'],
          //     formatter: function (y) {
          //       return y + " days";
          //     },
          //     resize: true
          //   });
          // }else{
          //   Morris.Donut({
          //     element: 'graph_donut3',
          //     data: [
          //       {label: 'Used', value: $totalDaysUsed },
          //       {label: 'Available', value: $daysRemaining}
          //     ],
          //     colors: ['#ff0000', '#FF4C4C'],
          //     formatter: function (y) {
          //       return y + " days";
          //     },
          //     resize: true
          //   });
          // }
          
      // }else if(entitlementDescription == 'ANNUAL'){  
          // $("#annualLeaveChart h2").html("Total: "+$totalEntitlementForPayment+" days");
          // $("#annualLeaveChart span").html(entitlementDescription+" Leave");
          // $('#annualLeaveChart').show();

          // if($totalDaysUsed == 0){
          //     Morris.Donut({
          //       element: 'graph_donut4',
          //       data: [
          //         {label: 'Available', value: $daysRemaining}
          //       ],
          //       colors: ['#16701c'],
          //       formatter: function (y) {
          //         return y + " days";
          //       },
          //       resize: true
          //     });
          // }else{
          //     Morris.Donut({
          //       element: 'graph_donut4',
          //       data: [
          //         {label: 'Used', value: $totalDaysUsed},
          //         {label: 'Available', value: $daysRemaining}
          //       ],
          //       colors: ['#16701c', '#80ed88'],
          //       formatter: function (y) {
          //         return y + " days";
          //       },
          //       resize: true
          //     });
          // }
      // }else if(entitlementDescription == 'PATERNITY' || entitlementDescription == 'MATERNITY'){
      //     $("#ParternityLeaveChart h2").html("Total: "+$totalEntitlementForPayment+" days");
      //     $("#ParternityLeaveChart span").html(entitlementDescription+" Leave");
      //     $("#ParternityLeaveChart").show();

      //     if($totalDaysUsed == 0){
      //         Morris.Donut({
      //           element: 'graph_donut',
      //           data: [
      //             {label: 'Available', value: $daysRemaining}
      //           ],
      //           colors: ['#16701c'],
      //           formatter: function (y) {
      //             return y + " days";
      //           },
      //           resize: true
      //         });
      //     }else{
      //         Morris.Donut({
      //           element: 'graph_donut',
      //           data: [
      //             {label: 'Used', value: $totalDaysUsed},
      //             {label: 'Available', value: $daysRemaining}
      //           ],
      //           colors: ['#16701c', '#80ed88'],
      //           formatter: function (y) {
      //             return y + " days";
      //           },
      //           resize: true
      //         });
      //     }
      // }else{
      //     console.log("not sick");
      // }          
    // }

    //get all entitlements
      //PersonID
      //LeaveGroupCode
    //get days used and available for each entitlement


  });
});