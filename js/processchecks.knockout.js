var proc;

proc = proc || {};

proc.machines = ['CYBOND22', 'CYBOT42', 'CYBOND17', 'CYBOND16'];

proc.process = [
  {
    name: "PMQPSK",
    bonders: ['CYBOND22', 'CYBOT42', 'CYBOND17', 'CYBOND16'],
    componentes: [
      {
        name: 'Diodo1',
        lcl: '100'
      }, {
        name: 'Diodo2',
        lcl: '100'
      }, {
        name: 'Diodo3',
        lcl: '100'
      }, {
        name: 'Diodo4',
        lcl: '100'
      }
    ]
  }, {
    name: "ICRX2",
    bonders: ['CYBOND22'],
    componentes: [
      {
        name: 'Diodo1',
        lcl: '230'
      }, {
        name: 'Diodo2',
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
    name: "DiamondROSA-HIC",
    bonders: ['CYBOND22'],
    componentes: [
      {
        name: 'TIA1',
        lcl: '1800'
      }, {
        name: 'TIA2',
        lcl: '1800'
      }, {
        name: 'TIA3',
        lcl: '1800'
      }, {
        name: 'TIA4',
        lcl: '1800'
      }, {
        name: 'Capacitor1',
        lcl: '200'
      }, {
        name: 'Capacitor2',
        lcl: '200'
      }, {
        name: 'Capacitor3',
        lcl: '200'
      }, {
        name: 'Capacitor4',
        lcl: '200'
      }, {
        name: 'Capacitor5',
        lcl: '200'
      }, {
        name: 'Capacitor6',
        lcl: '200'
      }, {
        name: 'Capacitor7',
        lcl: '200'
      }, {
        name: 'Capacitor8',
        lcl: '200'
      }, {
        name: 'CapacitorSMT',
        lcl: '150'
      }
    ]
  }, {
    name: "SuperNovaROSA-HIC",
    bonders: ['CYBOND22'],
    componentes: [
      {
        name: 'TIA 1',
        lcl: '1800'
      }, {
        name: 'TIA 2',
        lcl: '1800'
      }, {
        name: 'TIA 3',
        lcl: '1800'
      }, {
        name: 'TIA 4',
        lcl: '1800'
      }, {
        name: 'TIA 5',
        lcl: '1800'
      }, {
        name: 'Capacitor 1',
        lcl: '200'
      }, {
        name: 'Capacitor 2',
        lcl: '200'
      }, {
        name: 'Capacitor 3',
        lcl: '200'
      }, {
        name: 'Capacitor 4',
        lcl: '200'
      }, {
        name: 'Capacitor 5',
        lcl: '200'
      }
    ]
  }
];
