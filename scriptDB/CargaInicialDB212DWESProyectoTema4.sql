-- Author: Oscar Pascual Ferrero
-- Created: 2 nov 2023

-- Insertar tres filas de datos en la tabla Departamentos
INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento) VALUES
('VTS', 'Ventas', '2023-03-15 10:30:00', 50000.00, '2023-01-01 08:00:00'),
('RCH', 'Recursos Humanos', '2023-05-20 08:45:00', 25000.50, NULL),
('MKT', 'Marketing', '2023-12-10 15:20:00', 75000.25, '2023-10-01 08:00:00'),
('LGT', 'Logística', '2023-01-25 12:00:00', 60000.75, NULL),
('TCN', 'Tecnología', '2023-09-02 09:15:00', 80000.30, NULL),
('CNT', 'Contabilidad', '2023-11-18 14:00:00', 45000.90, NULL);
