 const ctx = document.getElementById('doughnut');
    const url = "http://localhost/iocl/Database/alldata.php";
    async function getchartdata(){
        const sensor1val =[];
        const time = [];
        const response = await fetch(url);
        const data = await response.json();
        //console.log(data);

        for (let index = 0; index < data.length; index++) {
            sensor1val[index] = data[index].temperature;
            time[index]=data[index].timestamp;
        }
        console.log(time);
        if (mychart) {
            mychart.data.labels = time;
                mychart.data.datasets[0].data = sensor1val;
                mychart.update(); 
        }else{
                mychart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: time,
                    datasets: [
                        {

                        label: 'sensor1',
                        data: sensor1val,
                        borderWidth: 1 
                    },
           
            ]
                },
                options: { }
            });
        }
    }
    let mychart;
     setInterval(getchartdata,1000);