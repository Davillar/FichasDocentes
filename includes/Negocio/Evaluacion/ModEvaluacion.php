<?php

namespace es\ucm;

class ModEvaluacion
{
    private $IdEvaluacion;
    private $RealizacionExamenes;
    private $RealizacionExamenesI;
    private $PesoExamenes;
    private $RealizacionActividades;
    private $RealizacionActividadesI;
    private $PesoActividades;
    private $RealizacionLaboratorio;
    private $RealizacionLaboratorioI;
    private $PesoLaboratorio;
    private $CalificacionFinalO;
    private $CalificacionFinalOI;
    private $CalificacionFinalE;
    private $CalificacionFinalEI;
    private $IdModAsignatura;

    public function __construct($IdEvaluacion, $RealizacionExamenes, $RealizacionExamenesI, $PesoExamenes, $RealizacionActividades, $RealizacionActividadesI, $PesoActividades, $RealizacionLaboratorio, $RealizacionLaboratorioI, $PesoLaboratorio, $CalificacionFinalO, $CalificacionFinalOI, $CalificacionFinalE, $CalificacionFinalEI, $IdModAsignatura)
    {
        $this->IdEvaluacion = $IdEvaluacion;
        $this->RealizacionExamenes = $RealizacionExamenes;
        $this->RealizacionExamenesI = $RealizacionExamenesI;
        $this->PesoExamenes = $PesoExamenes;
        $this->RealizacionActividades = $RealizacionActividades;
        $this->RealizacionActividadesI = $RealizacionActividadesI;
        $this->PesoActividades = $PesoActividades;
        $this->RealizacionLaboratorio = $RealizacionLaboratorio;
        $this->RealizacionLaboratorioI = $RealizacionLaboratorioI;
        $this->PesoLaboratorio = $PesoLaboratorio;
        $this->CalificacionFinalO = $CalificacionFinalO;
        $this->CalificacionFinalOI = $CalificacionFinalOI;
        $this->CalificacionFinalE = $CalificacionFinalE;
        $this->CalificacionFinalEI = $CalificacionFinalEI;
        $this->IdModAsignatura = $IdModAsignatura;
    }

    /**
     * @return mixed
     */
    public function getIdEvaluacion()
    {
        return $this->IdEvaluacion;
    }

    /**
     * @param mixed $IdEvaluacion
     *
     * @return self
     */
    public function setIdEvaluacion($IdEvaluacion)
    {
        $this->IdEvaluacion = $IdEvaluacion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRealizacionExamenes()
    {
        return $this->RealizacionExamenes;
    }

    /**
     * @param mixed $RealizacionExamenes
     *
     * @return self
     */
    public function setRealizacionExamenes($RealizacionExamenes)
    {
        $this->RealizacionExamenes = $RealizacionExamenes;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRealizacionExamenesI()
    {
        return $this->RealizacionExamenesI;
    }

    /**
     * @param mixed $RealizacionExamenesI
     *
     * @return self
     */
    public function setRealizacionExamenesI($RealizacionExamenesI)
    {
        $this->RealizacionExamenesI = $RealizacionExamenesI;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPesoExamenes()
    {
        return $this->PesoExamenes;
    }

    /**
     * @param mixed $PesoExamenes
     *
     * @return self
     */
    public function setPesoExamenes($PesoExamenes)
    {
        $this->PesoExamenes = $PesoExamenes;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRealizacionActividades()
    {
        return $this->RealizacionActividades;
    }

    /**
     * @param mixed $RealizacionActividades
     *
     * @return self
     */
    public function setRealizacionActividades($RealizacionActividades)
    {
        $this->RealizacionActividades = $RealizacionActividades;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRealizacionActividadesI()
    {
        return $this->RealizacionActividadesI;
    }

    /**
     * @param mixed $RealizacionActividadesI
     *
     * @return self
     */
    public function setRealizacionActividadesI($RealizacionActividadesI)
    {
        $this->RealizacionActividadesI = $RealizacionActividadesI;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPesoActividades()
    {
        return $this->PesoActividades;
    }

    /**
     * @param mixed $PesoActividades
     *
     * @return self
     */
    public function setPesoActividades($PesoActividades)
    {
        $this->PesoActividades = $PesoActividades;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRealizacionLaboratorio()
    {
        return $this->RealizacionLaboratorio;
    }

    /**
     * @param mixed $RealizacionLaboratorio
     *
     * @return self
     */
    public function setRealizacionLaboratorio($RealizacionLaboratorio)
    {
        $this->RealizacionLaboratorio = $RealizacionLaboratorio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRealizacionLaboratorioI()
    {
        return $this->RealizacionLaboratorioI;
    }

    /**
     * @param mixed $RealizacionLaboratorioI
     *
     * @return self
     */
    public function setRealizacionLaboratorioI($RealizacionLaboratorioI)
    {
        $this->RealizacionLaboratorioI = $RealizacionLaboratorioI;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPesoLaboratorio()
    {
        return $this->PesoLaboratorio;
    }

    /**
     * @param mixed $PesoLaboratorio
     *
     * @return self
     */
    public function setPesoLaboratorio($PesoLaboratorio)
    {
        $this->PesoLaboratorio = $PesoLaboratorio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalificacionFinalO()
    {
        return $this->CalificacionFinalO;
    }

    /**
     * @param mixed $CalificacionFinalO
     *
     * @return self
     */
    public function setCalificacionFinalO($CalificacionFinalO)
    {
        $this->CalificacionFinalO = $CalificacionFinalO;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalificacionFinalOI()
    {
        return $this->CalificacionFinalOI;
    }

    /**
     * @param mixed $CalificacionFinalOI
     *
     * @return self
     */
    public function setCalificacionFinalOI($CalificacionFinalOI)
    {
        $this->CalificacionFinalOI = $CalificacionFinalOI;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalificacionFinalE()
    {
        return $this->CalificacionFinalE;
    }

    /**
     * @param mixed $CalificacionFinalE
     *
     * @return self
     */
    public function setCalificacionFinalE($CalificacionFinalE)
    {
        $this->CalificacionFinalE = $CalificacionFinalE;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalificacionFinalEI()
    {
        return $this->CalificacionFinalEI;
    }

    /**
     * @param mixed $CalificacionFinalEI
     *
     * @return self
     */
    public function setCalificacionFinalEI($CalificacionFinalEI)
    {
        $this->CalificacionFinalEI = $CalificacionFinalEI;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdModAsignatura()
    {
        return $this->IdModAsignatura;
    }

    /**
     * @param mixed $IdModAsignatura
     *
     * @return self
     */
    public function setIdModAsignatura($IdModAsignatura)
    {
        $this->IdModAsignatura = $IdModAsignatura;

        return $this;
    }
}
