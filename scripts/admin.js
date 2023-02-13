let temp = {};
let xValues = [];
let data = [];

let firstDate = null;
let lastDate = null

axios({
    url: 'api.php',
    data: {},
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
    },
})
    .then(function (response) {
        for (let x in response.data){
            let h = response.data[x];
            if (!firstDate) {
                firstDate = Date.parse(h[2]);
                lastDate = Date.parse(h[2]);
            }
            if (Date.parse(h[2]) < firstDate){
                firstDate = Date.parse(h[2]);
            }
            if (Date.parse(h[2]) > lastDate){
                lastDate = Date.parse(h[2]);
            }
            if (Object.hasOwn(temp, h[2])){
                temp[Date.parse(h[2])] += Number(h[1]);
            }
            else {
                temp[Date.parse(h[2])] = Number(h[1]);
            }
        }
        console.log(new Date(firstDate), new Date(lastDate));
        while (firstDate < lastDate){
            let ll = new Date(firstDate + 24 * 60 * 60 * 1000).valueOf();
            console.log(ll);
            if (!Object.hasOwn(temp, ll)){
                temp[Date(firstDate)] = 0;
            }
            firstDate = ll;
        }
        console.log(temp);
        xValues = Object.values(temp);
        data = Object.keys(temp);

        new Chart("myChart", {
            type: "line",
            data: {
                labels: data,
                datasets: [{
                data: xValues,
                borderColor: "green",
                fill: true
                }]
            },
            options: {
                legend: {display: false}
            }
            });

    })
    .catch(function (error) {
        console.log(error);
    });



