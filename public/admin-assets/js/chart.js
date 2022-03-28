
 //========= start Products pieCharte
 var ctx = document.getElementById("myChart").getContext("2d");


 var data_all=[];
            $.ajax({
              url: 'get_all_counts',
              type: 'Get',
              data: {

                " _token": '{{csrf_token()}}'
              },
              success: function(result) {	
        
            var a,b,c,o1,o2,o3;
            a = result['total_product'];
            b = result['published_product'];
            c = result['unpublished_product'];

            o1 = result['paid_orders'] +result['created_orders'];
            o2 = result['created_orders'];
            o3 = result['paid_orders'];

            var myChart = new Chart(ctx, {
              // Type of Chart - bar, line, pie, doughnut, radar, polarArea
              type: "doughnut",

              data: {
                labels: [
                  "Total Products",
                  "Published Products",
                  " Unpublished products",
                ],

                datasets: [
                  {
                    data: [a, b, c],

                    backgroundColor: ["#fd3995", "#34bfa3", "#5d78ff" , "#FFFF00","#e9ec1c" , "#df832e" , "#95968b" , "#f30f22", "#e77680" , "#c07c16" ,"#000000" , "#00FFFb" , "FFFFFF" ],

                    borderColor: [
                      "rgba(255, 99, 132, 1)",
                      "rgba(54, 162, 235, 1)",
                      "rgba(255, 206, 86, 1)",
                    ],

                    borderWidth: 1,
                  },
                ],
              },

              // Configuration options go here
              options: {
                responsive: false,

                legend: {
                  display: false,
                },
              },
            });

            //========= end  Products pieCharte
            //========= Start  Products seller

            arr1=[];
            arr2=[];
            for( var key in result['category_product'] ) {
              var value = result['category_product'][key];
            arr1.push(value);
            arr2.push(key);
            
            }
            
            labels =arr2;
            data =arr1;

            var ctx2 = document.getElementById("myChart2").getContext("2d");
            var myChart = new Chart(ctx2, {
                  // Type of Chart - bar, line, pie, doughnut, radar, polarArea
                  type: "doughnut",

                  data: {
                    labels,

                    datasets: [
                      {
                        data,
                        backgroundColor: ["#fd3995", "#34bfa3", "#5d78ff" , "#FFFF00","#e9ec1c" , "#df832e" , "#95968b" , "#f30f22", "#e77680" , "#c07c16" ,"#000000" , "#00FFFb" , "FFFFFF" ],

                        borderColor: [
                          "rgba(255, 99, 132, 1)",
                          "rgba(54, 162, 235, 1)",
                          "rgba(255, 206, 86, 1)",
                        ],

                        borderWidth: 1,
                      },
                    ],
                  },

                  // Configuration options go here
                  options: {
                    responsive: false,

                    legend: {
                      display: false,
                    },
                  },
                });
//========= end  Products seller

 var ctx3 = document.getElementById("myChart3").getContext("2d");
 var myChart3 = new Chart(ctx3, {
   // Type of Chart - bar, line, pie, doughnut, radar, polarArea
   type: "bar",

   data: {
     labels: [
      "Total order",
      "Total Completed",
      "Total Pending"
     ],

     datasets: [
       {
         data: [o1, o2,  o3 , 0],
         backgroundColor: ["#fd3995", "#34bfa3", "#5d78ff" , "#FFFF00","#e9ec1c" , "#df832e" , "#95968b" , "#f30f22", "#e77680" , "#c07c16" ,"#000000" , "#00FFFb" , "FFFFFF" ],
         borderColor: [
           "rgba(255, 99, 132, 1)",
           "rgba(54, 162, 235, 1)",
           "rgba(255, 206, 86, 1)",
         ],

         borderWidth: 1,
       },
     ],
   },

   // Configuration options go here
   options: {
     responsive: false,

     legend: {
       display: false,
     },
   },
 });


 //========= Start  Products seller
            var ctx2 = document.getElementById("myChart2").getContext("2d");
                var myChart = new Chart(ctx2, {
                  // Type of Chart - bar, line, pie, doughnut, radar, polarArea
                  type: "doughnut",

                  data: {
                    labels,
                    // : [
                    //   a,
                    //   "Total approved sellers",
                    //   "Total pending sellers",
                    // ],

                    datasets: [
                      {
                        data,

                        backgroundColor: ["#fd3995", "#34bfa3", "#5d78ff" , "#FFFF00","#e9ec1c" , "#df832e" , "#95968b" , "#f30f22", "#e77680" , "#c07c16" ,"#000000" , "#00FFFb" , "FFFFFF" ],

                        borderColor: [
                          "rgba(255, 99, 132, 1)",
                          "rgba(54, 162, 235, 1)",
                          "rgba(255, 206, 86, 1)",
                        ],

                        borderWidth: 1,
                      },
                    ],
                  },

                  // Configuration options go here
                  options: {
                    responsive: false,

                    legend: {
                      display: false,
                    },
                  },
                });
//========= end  Products seller
//====Category by sale
 var ctx3 = document.getElementById("myChart3").getContext("2d");

 var myChart3 = new Chart(ctx3, {
   // Type of Chart - bar, line, pie, doughnut, radar, polarArea
   type: "bar",

   data: {
     labels: [
       "Total order",
       "Total Completed",
       "Total Pending",
     ],

     datasets: [
       {
         data: [o1, o2,o3 , 0],

         backgroundColor: "#5d78ff",

         borderColor: [
           "rgba(255, 99, 132, 1)",
           "rgba(54, 162, 235, 1)",
           "rgba(255, 206, 86, 1)",
         ],

         borderWidth: 1,
       },
     ],
   },

   // Configuration options go here
   options: {
     responsive: false,

     legend: {
       display: false,
     },
   },
 });

 //====end of Category by sale
 //====Category by stock

 arr3=[];
 arr4=[];
 for( var key in result['top_category'] ) {
   var value = result['top_category'][key];
 arr3.push(value);
 arr4.push(key);
 
 }
 labels = arr4;

 var ctx4 = document.getElementById("myChart4").getContext("2d");
 var myChart4 = new Chart(ctx4, {
   // Type of Chart - bar, line, pie, doughnut, radar, polarArea

   type: "bar",
   

   data: {
     labels,
     datasets: [
       {
         data: arr3,

         backgroundColor: "#e83e8c",

         borderColor: [
           "rgba(255, 99, 132, 1)",
           "rgba(54, 162, 235, 1)",
           "rgba(255, 206, 86, 1)",
         ],

         borderWidth: 1,
       },
     ],
   },

   // Configuration options go here
   options: {
     responsive: false,

     legend: {
       display: false,
     },
   },
 })

  
}
});