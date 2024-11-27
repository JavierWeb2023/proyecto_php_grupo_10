<?php

class Items {
  public $conn;
  public $itemsTable = 'turnos'; // Default table name

  public function __construct($conn) {
    $this->conn = $conn;
  }

  public function create(string $nombre, string $apellido, string $tramite, Date $fecha, Time $horario, int $id_cliente): bool {
    $stmt = $this->conn->prepare("
      INSERT INTO {$this->itemsTable} (`nombre`, `apellido`, `tramite`, `fecha`, `horario`, `id_cliente`)
      VALUES (?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param('sssssi', $nombre, $apellido, $tramite, $fecha->format('Y-m-d'), $horario->format('H:i:s'), $id_cliente);

    if ($stmt->execute()) {
      return true;
    } else {
      // Handle errors (e.g., throw an exception)
      throw new PDOException($stmt->error);
    }
  }

  public function read(int $id = null): mysqli_result {
    $stmt = $this->conn->prepare($id ?
      "SELECT * FROM {$this->itemsTable} WHERE id_cliente = ?" :
      "SELECT * FROM {$this->itemsTable}"
    );

    if ($id) {
      $stmt->bind_param('i', $id);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
  }

  public function update(string $tramite, Date $fecha, Time $horario): bool {
    $stmt = $this->conn->prepare("
      UPDATE {$this->itemsTable}
      SET tramite = ?, fecha = ?, horario = ? WHERE id = ?
    ");

    $stmt->bind_param('sssi', $tramite, $fecha->format('Y-m-d'), $horario->format('H:i:s'), $id);

    if ($stmt->execute()) {
      return true;
    } else {
      // Handle errors (e.g., throw an exception)
      throw new PDOException($stmt->error);
    }
  }

  public function delete(int $id): bool {
    $stmt = $this->conn->prepare("
      DELETE FROM {$this->itemsTable}
      WHERE id = ?
    ");

    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
      return true;
    } else {
      // Handle errors (e.g., throw an exception)
      throw new PDOException($stmt->error);
    }
  }
}


?>