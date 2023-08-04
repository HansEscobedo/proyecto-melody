// Obtener referencias a los elementos del DOM
let chartContainer = document.getElementById('chartContainer');
let ctxBarConcerts = document.getElementById('myChartBarConcerts');
let ctxBarPayment = document.getElementById('myChartBarPayment');
let ctxPiePayment = document.getElementById('myChartPiePayment');
let chartHTML = document.getElementById('chart');

let chartBarConcerts = null;
let chartBarPayment = null;
let chartPiePayment = null;

// Función para generar los gráficos
function generateCharts() {
  // Eliminar los gráficos existentes si los hay
  if (chartBarConcerts) {
    chartBarConcerts.destroy();
  }
  if (chartBarPayment) {
    chartBarPayment.destroy();
  }
  if (chartPiePayment) {
    chartPiePayment.destroy();
  }
  chartHTML.hidden = true;

  // Generar los gráficos de los conciertos y los métodos de pago
  fetch('/all-concert-sales')
    .then(response => response.json())
    .then(concerts => {
      console.log(concerts);

      const labelsConcerts = concerts.map(concert => concert.name);
      const valuesConcerts = concerts.map(concert => parseInt(concert.detail_order_sum_total) || 0);

      // Crea el contexto del gráfico de barras de conciertos
      const ctxBarConcerts = document.getElementById('myChartBarConcerts');

      // Crea el gráfico de barras de conciertos
      chartBarConcerts = new Chart(ctxBarConcerts, {
        type: 'bar',
        data: {
          labels: labelsConcerts,
          datasets: [{
            label: 'Total Vendido',
            data: valuesConcerts,
            backgroundColor: 'rgba(4, 101, 255, 0.25)',
            borderWidth: 1
          }]
        },
        options: {
          plugins: {
            legend: {
              display: false
            },
            datalabels: {
              align: 'end',
              anchor: 'end'
            }
          },
          scales: {
            x: {
              ticks: {
                autoSkip: false,
                maxRotation: labelsConcerts.length > 7 ? 90 : 0,
                minRotation: labelsConcerts.length > 7 ? 90 : 0,
                callback: function (value) {
                    const truncatedLabel = this.getLabelForValue(value).substr(0, 10); // Trunca los nombres a 10 caracteres
                    if (truncatedLabel.length < this.getLabelForValue(value).length) {
                      return truncatedLabel + '...'; // Agrega "..." al final si el nombre se truncó
                    }
                    return truncatedLabel;
                }


              }
            },
            y: {
              beginAtZero: true
            }
          }
        }
      });

      // Generar los gráficos de los métodos de pago
      fetch('/all-detail-orders')
        .then(response => response.json())
        .then(detailOrders => {
          console.log(detailOrders);

          const paymentTotals = {
            'Efectivo': 0,
            'Transferencia': 0,
            'Débito': 0,
            'Crédito': 0,
          };

          detailOrders.forEach(detail => {
            let paymentMethod = detail.payment_method;
            const total = detail.total;

            switch (paymentMethod) {
              case 1:
                paymentMethod = 'Efectivo';
                break;
              case 2:
                paymentMethod = 'Transferencia';
                break;
              case 3:
                paymentMethod = 'Débito';
                break;
              case 4:
                paymentMethod = 'Crédito';
                break;
            }

            paymentTotals[paymentMethod] += total;
          });

          const labelsPayment = Object.keys(paymentTotals);
          const valuesPayment = Object.values(paymentTotals);

          // Crea el contexto del gráfico de barras de métodos de pago
          const ctxBarPayment = document.getElementById('myChartBarPayment');

          // Crea el gráfico de barras de métodos de pago
          chartBarPayment = new Chart(ctxBarPayment, {
            type: 'bar',
            data: {
              labels: labelsPayment,
              datasets: [{
                label: 'Monto Total Vendido',
                data: valuesPayment,
                backgroundColor: [
                  'rgba(90, 0, 255, 0.25)',
                  'rgba(168, 178, 255, 0.25)',
                  'rgba(234, 255, 0, 0.25)',
                  'rgba(0, 81, 255,0.25)',
                  'rgba(0, 212, 161, 0.25)'
                ],
                borderWidth: 1
              }]
            },
            options: {
              plugins: {
                legend: {
                  display: false
                },
                datalabels: {
                  align: 'end',
                  anchor: 'end'
                }
              },
              scales: {
                x: {
                  ticks: {
                    autoSkip: false,
                    maxRotation: 0,
                    minRotation: 0
                  }
                },
                y: {
                  beginAtZero: true
                }
              }
            }
          });

          // Crea el contexto del gráfico de pie de métodos de pago
          const ctxPiePayment = document.getElementById('myChartPiePayment');

          // Crea el gráfico de pie de métodos de pago con los porcentajes
          chartPiePayment = new Chart(ctxPiePayment, {
            type: 'pie',
            data: {
              labels: labelsPayment,
              datasets: [{
                data: valuesPayment,
                backgroundColor: [
                  'rgba(90, 0, 255, 0.25)',
                  'rgba(168, 178, 255, 0.25)',
                  'rgba(234, 255, 0, 0.25)',
                  'rgba(0, 81, 255,0.25)',
                  'rgba(0, 212, 161, 0.25)'
                ],
                borderWidth: 1
              }]
            },
            options: {
              plugins: {
                legend: {
                  display: true
                },
                tooltips: {
                    enabled: true
                },
                datalabels: {
                  formatter: (value, ctxPiePayment) => {
                    const datapoints = ctxPiePayment.chart.data.datasets[0].data;
                    function sumaTotal(total, datapoint) {
                        return total + datapoint
                    }
                    const porcentajeTotal = datapoints.reduce(sumaTotal, 0);
                    const valorPorcentaje = (value / porcentajeTotal * 100).toFixed(2);
                    const despliegue = [`${valorPorcentaje}%`]
                    return despliegue;
                  }
                }
              },
              animation: {
                duration: 0
              }
            },
            plugins: [ChartDataLabels]
          });

          chartHTML.hidden = false;
        })
        .catch(error => {
          console.error('Error al obtener los detalles de orden:', error);
        });
    })
    .catch(error => {
      console.error('Error al obtener los datos de los conciertos:', error);
    });
}

// Generar los gráficos al cargar la página
generateCharts();
