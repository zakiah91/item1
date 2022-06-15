<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\ServiceManagement;

class SystemParameter extends \Google\Model
{
  /**
   * @var string
   */
  public $httpHeader;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $urlQueryParameter;

  /**
   * @param string
   */
  public function setHttpHeader($httpHeader)
  {
    $this->httpHeader = $httpHeader;
  }
  /**
   * @return string
   */
  public function getHttpHeader()
  {
    return $this->httpHeader;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setUrlQueryParameter($urlQueryParameter)
  {
    $this->urlQueryParameter = $urlQueryParameter;
  }
  /**
   * @return string
   */
  public function getUrlQueryParameter()
  {
    return $this->urlQueryParameter;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SystemParameter::class, 'Google_Service_ServiceManagement_SystemParameter');