<?php
namespace Segment;

class Segment
{
    public function __construct()
    {
        
    }

    public function new($data)
    {
        switch ($data['event']) {
            case 'Exited Inner Fence':
                return $this->exitInnerFence($data);
                break;

            case 'Exited Outer Fence':
                return $this->exitOuterFence($data);
                break;

            case 'Entered Inner Fence':
                return $this->enteredInnerFence($data);
                break;

            case 'Entered Outer Fence':
                return $this->enteredOuterFence($data);
                break;
            
            default:
                return false;
                break;
        }
    }

    private function exitInnerFence($data)
    {
        $event = array(
            'roaming_request_id' => $data['properties']['Roaming Request ID'],
            'run_id' => $data['properties']['Run ID'],
            'shift_id' => $data['properties']['Shift ID'],
            'event_type' => 'exitInnerFence',
            'event_timestamp' => $this->cleanTimestamp($data['timestamp']));
        
        return $event;
    }

    private function exitOuterFence($data)
    {
        $event = array(
            'roaming_request_id' => $data['properties']['Roaming Request ID'],
            'run_id' => $data['properties']['Run ID'],
            'shift_id' => $data['properties']['Shift ID'],
            'event_type' => 'exitOuterFence',
            'event_timestamp' => $this->cleanTimestamp($data['timestamp']));
        
        return $event;
    }

    private function enterInnerFence($data)
    {
        $event = array(
            'roaming_request_id' => $data['properties']['Roaming Request ID'],
            'run_id' => $data['properties']['Run ID'],
            'shift_id' => $data['properties']['Shift ID'],
            'event_type' => 'enterInnerFence',
            'event_timestamp' => $this->cleanTimestamp($data['timestamp']));
        
        return $event;
    }

    private function enterOuterFence($data)
    {
        $event = array(
            'roaming_request_id' => $data['properties']['Roaming Request ID'],
            'run_id' => $data['properties']['Run ID'],
            'shift_id' => $data['properties']['Shift ID'],
            'event_type' => 'enterOuterFence',
            'event_timestamp' => $this->cleanTimestamp($data['timestamp']));
        
        return $event;
    }

    private function cleanTimestamp($timeStamp)
    {
        $timeStamp = explode('.', $timeStamp);
        return $timeStamp[0];
    }
}
