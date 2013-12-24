var app;

app = app || {};

app.machines = ['CYBOND22', 'CYBOT42', 'CYBOND17', 'CYBOND16'];

app.process = [
  {
    name: "PMQPSK",
    bonders: ['CYBOND22', 'CYBOND17', 'CYBOND16'],
    componentes: [
      {
        name: 'Diodo_1',
        lcl: '100'
      }, {
        name: 'Diodo_2',
        lcl: '100'
      }, {
        name: 'Diodo_3',
        lcl: '100'
      }, {
        name: 'Diodo_4',
        lcl: '100'
      }
    ]
  }, {
    name: "ICRX2",
    bonders: ['CYBOND22'],
    componentes: [
      {
        name: 'Diodo_1',
        lcl: '230'
      }, {
        name: 'Diodo_2',
        lcl: '230'
      }
    ]
  }, {
    name: "DiamondTOSA-PKG",
    bonders: ['CYBOND22']
  }, {
    name: "DiamondROSA-PKG",
    bonders: ['CYBOND22']
  }, {
    name: "DiamondTOSA-HIC",
    bonders: ['CYBOT42']
  }, {
    name: "DiamondROSA_HIC",
    bonders: ['CYBOND42'],
    componentes: [
      {
        name: 'TIA_1',
        lcl: '1800'
      }, {
        name: 'TIA_2',
        lcl: '1800'
      }, {
        name: 'TIA_3',
        lcl: '1800'
      }, {
        name: 'TIA_4',
        lcl: '1800'
      }, {
        name: 'Capacitor_1',
        lcl: '200'
      }, {
        name: 'Capacitor_2',
        lcl: '200'
      }, {
        name: 'Capacitor_3',
        lcl: '200'
      }, {
        name: 'Capacitor_4',
        lcl: '200'
      }, {
        name: 'Capacitor_5',
        lcl: '200'
      }, {
        name: 'Capacitor_6',
        lcl: '200'
      }, {
        name: 'Capacitor_7',
        lcl: '200'
      }, {
        name: 'Capacitor_8',
        lcl: '200'
      }, {
        name: 'Capacitor_SMT',
        lcl: '150'
      }
    ]
  }, {
    name: "SuperNovaROSA_HIC",
    bonders: ['CYBOND42'],
    componentes: [
      {
        name: 'TIA_1',
        lcl: '1800'
      }, {
        name: 'TIA_2',
        lcl: '1800'
      }, {
        name: 'TIA_3',
        lcl: '1800'
      }, {
        name: 'TIA_4',
        lcl: '1800'
      }, {
        name: 'TIA_5',
        lcl: '1800'
      }, {
        name: 'Capacitor_1',
        lcl: '200'
      }, {
        name: 'Capacitor_2',
        lcl: '200'
      }, {
        name: 'Capacitor_3',
        lcl: '200'
      }, {
        name: 'Capacitor_4',
        lcl: '200'
      }, {
        name: 'Capacitor_5',
        lcl: '200'
      }
    ]
  }
];
